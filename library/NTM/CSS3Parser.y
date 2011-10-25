%name CSS3Parser

%token_prefix TK_

%include {

namespace NTM;

use stdClass;
use NTM\CSS\SimpleSelector,
    NTM\CSS\AdjacentSibling,
    NTM\CSS\Descendant,
    NTM\CSS\GeneralSibling,
    NTM\CSS\Child,
    NTM\CSS\PseudoClass,
    NTM\CSS\AttributeTest;

class ParceTokenException extends \ErrorException{};
}

%syntax_error { throw new ParceTokenException('Syntax error: '.$yyminor->value,$yymajor,0,'',$yyminor->line); }
%stack_overflow { throw new ParceTokenException('Stack overflow: '.$yyminor->value,$yymajor,0,'',$yyminor->line); }
%parse_failure { throw new ParceTokenException('Parse failure: '.$yyminor->value,$yymajor,0,'',$yyminor->line); }


start ::= selectors_group.

selectors_group ::= selector(s).     { $this->selectors = array(s->getRoot()); }
selectors_group ::= selectors_group COMMA selector(s). { $this->selectors[] = s->getRoot(); }

selector(s) ::= simple_selector_sequence(sss).      { s = sss; }
selector(s) ::= selector(o) combinator(c) simple_selector_sequence(sss). { s = sss; o->setCombinator(new c(sss)); }

combinator(c) ::= PLUS.    [S]      { c = 'NTM\CSS\AdjacentSibling'; }
combinator(c) ::= GREATER. [S]      { c = 'NTM\CSS\Child';}
combinator(c) ::= TILDE.    [S]     { c = 'NTM\CSS\GeneralSibling'; }
combinator(c) ::= S.                { c = 'NTM\CSS\Descendant'; }

simple_selector_sequence(r) ::= type_selector(t) selector_list(s).      { r = t->merge(s); }
simple_selector_sequence(r) ::= universal(u) selector_list(s).          { r = u->merge(s); }
simple_selector_sequence(r) ::= type_selector(t).                       { r = t; }
simple_selector_sequence(r) ::= universal(u).                           { r = u; }
simple_selector_sequence(r) ::= selector_list(s).                       { r = s; }

selector_list(l) ::= selector_variance(v).                              { l = v; }
selector_list(l) ::= selector_list(s) selector_variance(v).             { l = s->merge(v); }

selector_variance(r) ::= HASH(v).          { r = SimpleSelector::instance()->setHash(v->value); }
selector_variance(r) ::= CLASS(v).         { r = SimpleSelector::instance()->addClass(v->value); }
selector_variance(r) ::= attrib(v).        { r = SimpleSelector::instance()->addAttribute(v); }
selector_variance(r) ::= pseudo(v).        { r = SimpleSelector::instance()->addPseudoClass(v); }
selector_variance(r) ::= negation.         { r = SimpleSelector::instance(); }

type_selector(t) ::= namespace_prefix IDENT(i).         { t = SimpleSelector::instance()->setElement(i->value); }
type_selector(t) ::= IDENT(i).                          { t = SimpleSelector::instance()->setElement(i->value); }

namespace_prefix ::= IDENT PIPE.
namespace_prefix ::= STAR PIPE.

universal(u) ::= namespace_prefix STAR.                 { u = SimpleSelector::instance()->setElement('*'); }
universal(u) ::= STAR.                                  { u = SimpleSelector::instance()->setElement('*'); }

identity(i) ::= namespace_prefix IDENT(s).          { i = s->value; }
identity(i) ::= IDENT(s).                           { i = s->value; }

attrib(a) ::= ATTR_OPEN identity(i) relation(r) value(v) ATTR_CLOSE.                { a = new AttributeTest(i,r,v); }
attrib(a) ::= ATTR_OPEN identity(i) relation(r) value(v) S IDENT(x) ATTR_CLOSE.     { a = new AttributeTest(i,r,v,x); }

value(v) ::= IDENT(s).                      { v = s->value; }
value(v) ::= STRING(s).                     { v = s->value; }

relation(r) ::= PREFIXMATCH(v).             { r = v->value; }
relation(r) ::= SUFFIXMATCH(v).             { r = v->value; }
relation(r) ::= SUBSTRINGMATCH(v).          { r = v->value; }
relation(r) ::= MATCH(v).                   { r = v->value; }
relation(r) ::= INCLUDES(v).                { r = v->value; }
relation(r) ::= DASHMATCH(v).               { r = v->value; }

pseudo(p) ::= COLON IDENT(i).               { p = new PseudoClass(i->value); }
pseudo(p) ::= COLON COLON IDENT(i).         { p = new PseudoClass(':'.i->value); }
pseudo(p) ::= COLON functional_pseudo(f).   { p = f; }

functional_pseudo(f) ::= FUNCTION(n) expression_list(l) FUNCTION_CLOSE.     { f = new PseudoClass(n->value,l); }

expression_list(l) ::= expression(e).                       { l = e; }
expression_list(l) ::= expression_list(o) expression(e).    { l = o.e; }
expression_list(l) ::= expression_list(o) S expression(e).  { l = o.' '.e; }

expression(e) ::= PLUS.         { e = '+'; }
expression(e) ::= DIMENSION(d). { e = d->value; }
expression(e) ::= NUMBER(n).    { e = n->value; }
expression(e) ::= STRING(s).    { e = '"'.s->value; }
expression(e) ::= IDENT(i).     { e = i->value; }
expression(e) ::= MINUS.        { e = '-'; }
expression(e) ::= CLASS(s).     { e = '.'.s->value; }


negation(n) ::= NOT negation_arg(a) FUNCTION_CLOSE. { n = new PseudoClass('not',a); }

negation_arg(a) ::= type_selector(v).   { a = v; }
negation_arg(a) ::= universal(v).       { a = v; }
negation_arg(a) ::= HASH(v).            { a = v; }
negation_arg(a) ::= CLASS(v).           { a = v; }
negation_arg(a) ::= attrib(v).          { a = v; }
negation_arg(a) ::= pseudo(v).          { a = v; }
