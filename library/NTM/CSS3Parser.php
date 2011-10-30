<?php

#line 5 "CSS3Parser.y"


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
#line 19 "CSS3Parser.php"
#include "CSS3Parser.h"

class CSS3Parser {
  private $yyidx = -1;               /* Index of top element in stack */
  private $yyerrcnt;                 /* Shifts left before out of the error */
  private $yystack = array();
  private $yyTraceFILE = null;
  private $yyTracePrompt = null;


  const TK_COMMA =  1;
  const TK_PLUS =  2;
  const TK_S =  3;
  const TK_GREATER =  4;
  const TK_TILDE =  5;
  const TK_HASH =  6;
  const TK_CLASS =  7;
  const TK_IDENT =  8;
  const TK_PIPE =  9;
  const TK_STAR = 10;
  const TK_ATTR_OPEN = 11;
  const TK_ATTR_CLOSE = 12;
  const TK_STRING = 13;
  const TK_PREFIXMATCH = 14;
  const TK_SUFFIXMATCH = 15;
  const TK_SUBSTRINGMATCH = 16;
  const TK_MATCH = 17;
  const TK_INCLUDES = 18;
  const TK_DASHMATCH = 19;
  const TK_COLON = 20;
  const TK_FUNCTION = 21;
  const TK_FUNCTION_CLOSE = 22;
  const TK_DIMENSION = 23;
  const TK_NUMBER = 24;
  const TK_MINUS = 25;
  const TK_NOT = 26;

  const YYNOCODE = 49;
#if INTERFACE
  const YYNSTATE = 78;
  const YYNRULE = 61;

  private $YY_NO_ACTION;
  private $YY_ACCEPT_ACTION;
  private $YY_ERROR_ACTION;

  /* action tables */ 

static $yy_action = array(
 /*     0 */   140,   18,   15,   77,   53,    4,    8,    5,   72,   32,
 /*    10 */    33,   34,   19,   14,   77,   17,    4,    8,    5,   72,
 /*    20 */    32,   33,   34,   19,   28,   54,    4,    8,    5,   72,
 /*    30 */    32,   33,   34,   19,   55,   13,   20,   37,   21,   61,
 /*    40 */    59,   11,   62,   22,   12,   58,   30,   31,   25,   37,
 /*    50 */    26,   10,    2,   55,   52,   56,   57,   60,   61,   59,
 /*    60 */    16,   51,   23,   35,   58,   49,    3,   68,   69,   25,
 /*    70 */    37,   26,   10,   36,   56,   57,   60,   24,    9,   38,
 /*    80 */    42,   16,   43,   44,   45,   46,   47,   48,   66,   40,
 /*    90 */    67,   39,   70,   71,   41,   19,   78,    1,   50,   30,
 /*   100 */    31,  141,   27,    6,   10,   72,   32,   33,   34,   29,
 /*   110 */    32,   33,   34,   16,   73,   76,   74,   75,    7,    3,
 /*   120 */    72,   32,   33,   34,   63,   65,   64,
);
static $yy_lookahead = array(
 /*     0 */    28,   29,   30,   31,   46,   33,   34,   35,   36,   37,
 /*    10 */    38,   39,   40,   30,   31,   42,   33,   34,   35,   36,
 /*    20 */    37,   38,   39,   40,   31,   46,   33,   34,   35,   36,
 /*    30 */    37,   38,   39,   40,    2,    3,    8,    9,   10,    7,
 /*    40 */     8,   45,   46,   40,   41,   13,    6,    7,    8,    9,
 /*    50 */    10,   11,   32,    2,   22,   23,   24,   25,    7,    8,
 /*    60 */    20,   44,   43,    9,   13,    8,   26,    6,    7,    8,
 /*    70 */     9,   10,   11,    9,   23,   24,   25,   20,   21,    8,
 /*    80 */    12,   20,   14,   15,   16,   17,   18,   19,   33,    8,
 /*    90 */    35,   12,   37,   38,   13,   40,    0,    1,    8,    6,
 /*   100 */     7,   48,   47,   34,   11,   36,   37,   38,   39,   36,
 /*   110 */    37,   38,   39,   20,    2,    3,    4,    5,   34,   26,
 /*   120 */    36,   37,   38,   39,    8,   22,   10,
);
  const YY_SHIFT_USE_DFLT = -1;
  const YY_SHIFT_MAX = 27;
static $yy_shift_ofst = array(
 /*     0 */    40,   40,   40,   61,   93,   93,   93,   93,   93,   51,
 /*    10 */    28,   32,   68,   51,  112,  112,   57,   81,   96,  116,
 /*    20 */    54,   64,   71,   79,   90,   54,   64,  103,
);
  const YY_REDUCE_USE_DFLT = -43;
  const YY_REDUCE_MAX = 17;
static $yy_reduce_ofst = array(
 /*     0 */   -28,  -17,   -7,   55,   69,   84,   73,   73,   73,   -4,
 /*    10 */     3,  -42,  -27,  -21,   20,   20,   17,   19,
);
static $yy_default = array(
 /*     0 */   139,  139,  139,  139,   89,   90,   87,   88,   91,  139,
 /*    10 */   139,  139,  139,  139,   80,   79,  139,  139,  139,  139,
 /*    20 */   107,  139,  139,  139,  139,  100,  105,  139,   82,   93,
 /*    30 */    94,   95,   96,   97,   98,  101,  102,  103,  106,  108,
 /*    40 */   110,  111,  109,  112,  113,  114,  115,  116,  117,  118,
 /*    50 */   119,  120,  121,  123,  124,  125,  126,  127,  128,  129,
 /*    60 */   130,  131,  122,   99,  104,  132,  133,  134,  135,  136,
 /*    70 */   137,  138,   92,   83,   84,   85,   86,   81,
);

  /* fallback */

  private static $yyFallback = array(
  );

  private static $yyTokenName = array( 
  '$',             'COMMA',         'PLUS',          'S',           
  'GREATER',       'TILDE',         'HASH',          'CLASS',       
  'IDENT',         'PIPE',          'STAR',          'ATTR_OPEN',   
  'ATTR_CLOSE',    'STRING',        'PREFIXMATCH',   'SUFFIXMATCH', 
  'SUBSTRINGMATCH',  'MATCH',         'INCLUDES',      'DASHMATCH',   
  'COLON',         'FUNCTION',      'FUNCTION_CLOSE',  'DIMENSION',   
  'NUMBER',        'MINUS',         'NOT',           'error',       
  'start',         'selectors_group',  'selector',      'simple_selector_sequence',
  'combinator',    'type_selector',  'selector_list',  'universal',   
  'selector_variance',  'attrib',        'pseudo',        'negation',    
  'namespace_prefix',  'identity',      'relation',      'value',       
  'functional_pseudo',  'expression_list',  'expression',    'negation_arg',
  );

  private static $yyRuleName = array(
 /*   0 */ "start ::= selectors_group",
 /*   1 */ "selectors_group ::= selector",
 /*   2 */ "selectors_group ::= selectors_group COMMA selector",
 /*   3 */ "selector ::= simple_selector_sequence",
 /*   4 */ "selector ::= selector combinator simple_selector_sequence",
 /*   5 */ "combinator ::= PLUS",
 /*   6 */ "combinator ::= GREATER",
 /*   7 */ "combinator ::= TILDE",
 /*   8 */ "combinator ::= S",
 /*   9 */ "simple_selector_sequence ::= type_selector selector_list",
 /*  10 */ "simple_selector_sequence ::= universal selector_list",
 /*  11 */ "simple_selector_sequence ::= type_selector",
 /*  12 */ "simple_selector_sequence ::= universal",
 /*  13 */ "simple_selector_sequence ::= selector_list",
 /*  14 */ "selector_list ::= selector_variance",
 /*  15 */ "selector_list ::= selector_list selector_variance",
 /*  16 */ "selector_variance ::= HASH",
 /*  17 */ "selector_variance ::= CLASS",
 /*  18 */ "selector_variance ::= attrib",
 /*  19 */ "selector_variance ::= pseudo",
 /*  20 */ "selector_variance ::= negation",
 /*  21 */ "type_selector ::= namespace_prefix IDENT",
 /*  22 */ "type_selector ::= IDENT",
 /*  23 */ "namespace_prefix ::= IDENT PIPE",
 /*  24 */ "namespace_prefix ::= STAR PIPE",
 /*  25 */ "namespace_prefix ::= PIPE",
 /*  26 */ "universal ::= namespace_prefix STAR",
 /*  27 */ "universal ::= STAR",
 /*  28 */ "identity ::= namespace_prefix IDENT",
 /*  29 */ "identity ::= IDENT",
 /*  30 */ "attrib ::= ATTR_OPEN identity relation value ATTR_CLOSE",
 /*  31 */ "attrib ::= ATTR_OPEN identity ATTR_CLOSE",
 /*  32 */ "value ::= IDENT",
 /*  33 */ "value ::= STRING",
 /*  34 */ "relation ::= PREFIXMATCH",
 /*  35 */ "relation ::= SUFFIXMATCH",
 /*  36 */ "relation ::= SUBSTRINGMATCH",
 /*  37 */ "relation ::= MATCH",
 /*  38 */ "relation ::= INCLUDES",
 /*  39 */ "relation ::= DASHMATCH",
 /*  40 */ "pseudo ::= COLON IDENT",
 /*  41 */ "pseudo ::= COLON COLON IDENT",
 /*  42 */ "pseudo ::= COLON functional_pseudo",
 /*  43 */ "functional_pseudo ::= FUNCTION expression_list FUNCTION_CLOSE",
 /*  44 */ "expression_list ::= expression",
 /*  45 */ "expression_list ::= expression_list expression",
 /*  46 */ "expression_list ::= expression_list S expression",
 /*  47 */ "expression ::= PLUS",
 /*  48 */ "expression ::= DIMENSION",
 /*  49 */ "expression ::= NUMBER",
 /*  50 */ "expression ::= STRING",
 /*  51 */ "expression ::= IDENT",
 /*  52 */ "expression ::= MINUS",
 /*  53 */ "expression ::= CLASS",
 /*  54 */ "negation ::= NOT negation_arg FUNCTION_CLOSE",
 /*  55 */ "negation_arg ::= type_selector",
 /*  56 */ "negation_arg ::= universal",
 /*  57 */ "negation_arg ::= HASH",
 /*  58 */ "negation_arg ::= CLASS",
 /*  59 */ "negation_arg ::= attrib",
 /*  60 */ "negation_arg ::= pseudo",
  );

  public function trace($TraceFILE, $zTracePrompt)
  {
    $this->yyTraceFILE = $TraceFILE;
    $this->yyTracePrompt = $zTracePrompt;

    if ($TraceFILE === null)
      $this->yyTracePrompt = null;
    else if ($zTracePrompt === null)
      $this->yyTraceFILE = null;
  }

  public function yy_token_name($tokenType)
  {
    if (isset(self::$yyTokenName[$tokenType]))
      return self::$yyTokenName[$tokenType];

    return "Unknown";
  }

  private function yy_destructor($yymajor, $yypminor)
  {
    switch ($yymajor)
    {
      default:  
        break;
    }
  }

  private function yy_pop_parser_stack() 
  {
    if ($this->yyidx < 0) 
      return 0;

    $yytos = $this->yystack[$this->yyidx];

    if ($this->yyTraceFILE) 
      fprintf($this->yyTraceFILE,"%sPopping %s\n", $this->yyTracePrompt, self::$yyTokenName[$yytos->major]);

    $this->yy_destructor( $yytos->major, $yytos->minor);
    unset($this->yystack[$this->yyidx]);
    $this->yyidx--;

    return $yytos->major;
  }

  public function __destruct()
  {
    while($this->yyidx >= 0)
      $this->yy_pop_parser_stack();
  }

  private function yy_find_shift_action($iLookAhead) 
  {
    $i = 0;
    $stateno = $this->yystack[$this->yyidx]->stateno;

    if ($stateno > self::YY_SHIFT_MAX || ($i = self::$yy_shift_ofst[$stateno]) == self::YY_SHIFT_USE_DFLT)
      return self::$yy_default[$stateno];

    if ($iLookAhead == self::YYNOCODE)
      return $this->YY_NO_ACTION;

    $i += $iLookAhead;
    if ($i < 0 || $i >= count(self::$yy_action) || self::$yy_lookahead[$i] != $iLookAhead)
    {
      if ($iLookAhead > 0)
      {
        if (isset(self::$yyFallback[$iLookAhead]) && ($iFallback = self::$yyFallback[$iLookAhead]) != 0) 
        {
          if ($this->yyTraceFILE) 
            fprintf($this->yyTraceFILE, "%sFALLBACK %s => %s\n", $this->yyTracePrompt, self::$yyTokenName[$iLookAhead], self::$yyTokenName[$iFallback]);

          return $this->yy_find_shift_action($iFallback);
        }
        if (defined('CSS3Parser::YYWILDCARD'))
        {
          $j = $i - $iLookAhead + self::YYWILDCARD;
          if ($j >= 0 && $j < count(self::$yy_action) && self::$yy_lookahead[$j] == self::YYWILDCARD)
          {
            if ($this->yyTraceFILE) 
              fprintf($this->yyTraceFILE, "%sWILDCARD %s => %s\n", $this->yyTracePrompt, self::$yyTokenName[$iLookAhead], self::$yyTokenName[self::YYWILDCARD]);

            return self::$yy_action[$j];
          }
        }
      }

      return self::$yy_default[$stateno];
    }
    else
      return self::$yy_action[$i];
  }

  private function yy_find_reduce_action($stateno, $iLookAhead)
  {
    $i = 0;

    if ($stateno > self::YY_REDUCE_MAX || ($i = self::$yy_reduce_ofst[$stateno]) == self::YY_REDUCE_USE_DFLT)
      return self::$yy_default[$stateno];

    if ($iLookAhead == self::YYNOCODE)
      return $this->YY_NO_ACTION;

    $i += $iLookAhead;
    if ($i < 0 || $i >= count(self::$yy_action) || self::$yy_lookahead[$i] != $iLookAhead)
      return self::$yy_default[$stateno];

    return self::$yy_action[$i];
  }

  private function yy_shift($yyNewState, $yyMajor, $yypMinor)
  {
    $this->yyidx++;

    if (isset($this->yystack[$this->yyidx])) 
    {
      $yytos = $this->yystack[$this->yyidx];
    } 
    else 
    {
      $yytos = new stdClass;
      $this->yystack[$this->yyidx] = $yytos;
    }

    $yytos->stateno = $yyNewState;
    $yytos->major = $yyMajor;
    $yytos->minor = $yypMinor;

    if ($this->yyTraceFILE) 
    {
      fprintf($this->yyTraceFILE,"%sShift %d\n", $this->yyTracePrompt, $yyNewState);
      fprintf($this->yyTraceFILE,"%sStack:", $this->yyTracePrompt);

      for ($i = 1; $i <= $this->yyidx; $i++) 
      {
        $ent = $this->yystack[$i];
        fprintf($this->yyTraceFILE, " %s", self::$yyTokenName[$ent->major]);
      }

      fprintf($this->yyTraceFILE, "\n");
    }
  }

  private function __overflow_dead_code() 
  {
#line 22 "CSS3Parser.y"
 throw new ParceTokenException('Stack overflow: '.$yyminor->value,$yymajor,0,'',$yyminor->line); 
#line 323 "CSS3Parser.php"
  }

  private static $yyRuleInfo = array(
  28, 1,
  29, 1,
  29, 3,
  30, 1,
  30, 3,
  32, 1,
  32, 1,
  32, 1,
  32, 1,
  31, 2,
  31, 2,
  31, 1,
  31, 1,
  31, 1,
  34, 1,
  34, 2,
  36, 1,
  36, 1,
  36, 1,
  36, 1,
  36, 1,
  33, 2,
  33, 1,
  40, 2,
  40, 2,
  40, 1,
  35, 2,
  35, 1,
  41, 2,
  41, 1,
  37, 5,
  37, 3,
  43, 1,
  43, 1,
  42, 1,
  42, 1,
  42, 1,
  42, 1,
  42, 1,
  42, 1,
  38, 2,
  38, 3,
  38, 2,
  44, 3,
  45, 1,
  45, 2,
  45, 3,
  46, 1,
  46, 1,
  46, 1,
  46, 1,
  46, 1,
  46, 1,
  46, 1,
  39, 3,
  47, 1,
  47, 1,
  47, 1,
  47, 1,
  47, 1,
  47, 1,
  );

  private function yy_reduce($yyruleno)
  {
    $yygoto = 0;              /* The next state */
    $yyact = 0;               /* The next action */
    $yygotominor = null;      /* The LHS of the rule reduced */
    $yymsp = null;            /* The top of the parser's stack */
    $yysize = 0;              /* Amount to pop the stack */

    $yymsp = $this->yystack[$this->yyidx];

    if ($this->yyTraceFILE && isset(self::$yyRuleName[$yyruleno]))
      fprintf($this->yyTraceFILE, "%sReduce [%s].\n", $this->yyTracePrompt, self::$yyRuleName[$yyruleno]);

    switch($yyruleno)
    {
      case 1: /* selectors_group ::= selector */
#line 28 "CSS3Parser.y"
{ $this->selectors = array($this->yystack[$this->yyidx + 0]->minor); }
#line 408 "CSS3Parser.php"
        break;
      case 2: /* selectors_group ::= selectors_group COMMA selector */
#line 29 "CSS3Parser.y"
{ $this->selectors[] = $this->yystack[$this->yyidx + 0]->minor; }
#line 413 "CSS3Parser.php"
        break;
      case 3: /* selector ::= simple_selector_sequence */
      case 11: /* simple_selector_sequence ::= type_selector */
      case 12: /* simple_selector_sequence ::= universal */
      case 13: /* simple_selector_sequence ::= selector_list */
      case 14: /* selector_list ::= selector_variance */
      case 42: /* pseudo ::= COLON functional_pseudo */
      case 44: /* expression_list ::= expression */
      case 55: /* negation_arg ::= type_selector */
      case 56: /* negation_arg ::= universal */
      case 57: /* negation_arg ::= HASH */
      case 58: /* negation_arg ::= CLASS */
      case 59: /* negation_arg ::= attrib */
      case 60: /* negation_arg ::= pseudo */
#line 31 "CSS3Parser.y"
{ $yygotominor = $this->yystack[$this->yyidx + 0]->minor; }
#line 430 "CSS3Parser.php"
        break;
      case 4: /* selector ::= selector combinator simple_selector_sequence */
#line 32 "CSS3Parser.y"
{ $yygotominor = $this->yystack[$this->yyidx + 0]->minor->setCombinator(new $this->yystack[$this->yyidx + -1]->minor($this->yystack[$this->yyidx + -2]->minor)); }
#line 435 "CSS3Parser.php"
        break;
      case 5: /* combinator ::= PLUS */
#line 34 "CSS3Parser.y"
{ $yygotominor = 'NTM\CSS\AdjacentSibling'; }
#line 440 "CSS3Parser.php"
        break;
      case 6: /* combinator ::= GREATER */
#line 35 "CSS3Parser.y"
{ $yygotominor = 'NTM\CSS\Child';}
#line 445 "CSS3Parser.php"
        break;
      case 7: /* combinator ::= TILDE */
#line 36 "CSS3Parser.y"
{ $yygotominor = 'NTM\CSS\GeneralSibling'; }
#line 450 "CSS3Parser.php"
        break;
      case 8: /* combinator ::= S */
#line 37 "CSS3Parser.y"
{ $yygotominor = 'NTM\CSS\Descendant'; }
#line 455 "CSS3Parser.php"
        break;
      case 9: /* simple_selector_sequence ::= type_selector selector_list */
      case 10: /* simple_selector_sequence ::= universal selector_list */
      case 15: /* selector_list ::= selector_list selector_variance */
#line 39 "CSS3Parser.y"
{ $yygotominor = $this->yystack[$this->yyidx + -1]->minor->merge($this->yystack[$this->yyidx + 0]->minor); }
#line 462 "CSS3Parser.php"
        break;
      case 16: /* selector_variance ::= HASH */
#line 48 "CSS3Parser.y"
{ $yygotominor = SimpleSelector::instance()->setHash($this->yystack[$this->yyidx + 0]->minor->value); }
#line 467 "CSS3Parser.php"
        break;
      case 17: /* selector_variance ::= CLASS */
#line 49 "CSS3Parser.y"
{ $yygotominor = SimpleSelector::instance()->addClass($this->yystack[$this->yyidx + 0]->minor->value); }
#line 472 "CSS3Parser.php"
        break;
      case 18: /* selector_variance ::= attrib */
#line 50 "CSS3Parser.y"
{ $yygotominor = SimpleSelector::instance()->addAttribute($this->yystack[$this->yyidx + 0]->minor); }
#line 477 "CSS3Parser.php"
        break;
      case 19: /* selector_variance ::= pseudo */
#line 51 "CSS3Parser.y"
{ $yygotominor = SimpleSelector::instance()->addPseudoClass($this->yystack[$this->yyidx + 0]->minor); }
#line 482 "CSS3Parser.php"
        break;
      case 20: /* selector_variance ::= negation */
#line 52 "CSS3Parser.y"
{ $yygotominor = SimpleSelector::instance(); }
#line 487 "CSS3Parser.php"
        break;
      case 21: /* type_selector ::= namespace_prefix IDENT */
#line 54 "CSS3Parser.y"
{ $yygotominor = SimpleSelector::instance()->setElement($this->yystack[$this->yyidx + 0]->minor->value)->setNamespace($this->yystack[$this->yyidx + -1]->minor); }
#line 492 "CSS3Parser.php"
        break;
      case 22: /* type_selector ::= IDENT */
#line 55 "CSS3Parser.y"
{ $yygotominor = SimpleSelector::instance()->setElement($this->yystack[$this->yyidx + 0]->minor->value); }
#line 497 "CSS3Parser.php"
        break;
      case 23: /* namespace_prefix ::= IDENT PIPE */
#line 57 "CSS3Parser.y"
{ $yygotominor = $this->yystack[$this->yyidx + -1]->minor->value; }
#line 502 "CSS3Parser.php"
        break;
      case 24: /* namespace_prefix ::= STAR PIPE */
#line 58 "CSS3Parser.y"
{ $yygotominor = '*'; }
#line 507 "CSS3Parser.php"
        break;
      case 25: /* namespace_prefix ::= PIPE */
#line 59 "CSS3Parser.y"
{ $yygotominor = ''; }
#line 512 "CSS3Parser.php"
        break;
      case 26: /* universal ::= namespace_prefix STAR */
#line 61 "CSS3Parser.y"
{ $yygotominor = SimpleSelector::instance()->setElement('*')->setNamespace($this->yystack[$this->yyidx + -1]->minor); }
#line 517 "CSS3Parser.php"
        break;
      case 27: /* universal ::= STAR */
#line 62 "CSS3Parser.y"
{ $yygotominor = SimpleSelector::instance()->setElement('*'); }
#line 522 "CSS3Parser.php"
        break;
      case 28: /* identity ::= namespace_prefix IDENT */
#line 64 "CSS3Parser.y"
{ $yygotominor = array($this->yystack[$this->yyidx + -1]->minor,$this->yystack[$this->yyidx + 0]->minor->value); }
#line 527 "CSS3Parser.php"
        break;
      case 29: /* identity ::= IDENT */
      case 32: /* value ::= IDENT */
      case 33: /* value ::= STRING */
      case 34: /* relation ::= PREFIXMATCH */
      case 35: /* relation ::= SUFFIXMATCH */
      case 36: /* relation ::= SUBSTRINGMATCH */
      case 37: /* relation ::= MATCH */
      case 38: /* relation ::= INCLUDES */
      case 39: /* relation ::= DASHMATCH */
      case 48: /* expression ::= DIMENSION */
      case 49: /* expression ::= NUMBER */
      case 51: /* expression ::= IDENT */
#line 65 "CSS3Parser.y"
{ $yygotominor = $this->yystack[$this->yyidx + 0]->minor->value; }
#line 543 "CSS3Parser.php"
        break;
      case 30: /* attrib ::= ATTR_OPEN identity relation value ATTR_CLOSE */
#line 67 "CSS3Parser.y"
{ $yygotominor = new AttributeTest($this->yystack[$this->yyidx + -3]->minor,$this->yystack[$this->yyidx + -2]->minor,$this->yystack[$this->yyidx + -1]->minor); }
#line 548 "CSS3Parser.php"
        break;
      case 31: /* attrib ::= ATTR_OPEN identity ATTR_CLOSE */
#line 68 "CSS3Parser.y"
{ $yygotominor = new AttributeTest($this->yystack[$this->yyidx + -1]->minor); }
#line 553 "CSS3Parser.php"
        break;
      case 40: /* pseudo ::= COLON IDENT */
#line 80 "CSS3Parser.y"
{ $yygotominor = new PseudoClass($this->yystack[$this->yyidx + 0]->minor->value); }
#line 558 "CSS3Parser.php"
        break;
      case 41: /* pseudo ::= COLON COLON IDENT */
#line 81 "CSS3Parser.y"
{ $yygotominor = new PseudoClass(':'.$this->yystack[$this->yyidx + 0]->minor->value); }
#line 563 "CSS3Parser.php"
        break;
      case 43: /* functional_pseudo ::= FUNCTION expression_list FUNCTION_CLOSE */
#line 84 "CSS3Parser.y"
{ $yygotominor = new PseudoClass($this->yystack[$this->yyidx + -2]->minor->value,$this->yystack[$this->yyidx + -1]->minor); }
#line 568 "CSS3Parser.php"
        break;
      case 45: /* expression_list ::= expression_list expression */
#line 87 "CSS3Parser.y"
{ $yygotominor = $this->yystack[$this->yyidx + -1]->minor.$this->yystack[$this->yyidx + 0]->minor; }
#line 573 "CSS3Parser.php"
        break;
      case 46: /* expression_list ::= expression_list S expression */
#line 88 "CSS3Parser.y"
{ $yygotominor = $this->yystack[$this->yyidx + -2]->minor.' '.$this->yystack[$this->yyidx + 0]->minor; }
#line 578 "CSS3Parser.php"
        break;
      case 47: /* expression ::= PLUS */
#line 90 "CSS3Parser.y"
{ $yygotominor = '+'; }
#line 583 "CSS3Parser.php"
        break;
      case 50: /* expression ::= STRING */
#line 93 "CSS3Parser.y"
{ $yygotominor = '"'.$this->yystack[$this->yyidx + 0]->minor->value; }
#line 588 "CSS3Parser.php"
        break;
      case 52: /* expression ::= MINUS */
#line 95 "CSS3Parser.y"
{ $yygotominor = '-'; }
#line 593 "CSS3Parser.php"
        break;
      case 53: /* expression ::= CLASS */
#line 96 "CSS3Parser.y"
{ $yygotominor = '.'.$this->yystack[$this->yyidx + 0]->minor->value; }
#line 598 "CSS3Parser.php"
        break;
      case 54: /* negation ::= NOT negation_arg FUNCTION_CLOSE */
#line 99 "CSS3Parser.y"
{ $yygotominor = new PseudoClass('not',$this->yystack[$this->yyidx + -1]->minor); }
#line 603 "CSS3Parser.php"
        break;
      default:
      /* (0) start ::= selectors_group */
        break;
    }

    $yygoto = self::$yyRuleInfo[2 * $yyruleno];
    $yysize = self::$yyRuleInfo[(2 * $yyruleno) + 1];

    $state_for_reduce = $this->yystack[$this->yyidx - $yysize]->stateno;

    $this->yyidx -= $yysize;
    $yyact = $this->yy_find_reduce_action($state_for_reduce,$yygoto);

    if ($yyact < self::YYNSTATE)
      $this->yy_shift($yyact, $yygoto, $yygotominor);
    else if ($yyact == self::YYNSTATE + self::YYNRULE + 1)
      $this->yy_accept();
  }

  private function yy_parse_failed()
  {
    if ($this->yyTraceFILE)
      fprintf($this->yyTraceFILE, "%sFail!\n", $this->yyTracePrompt);

    while ($this->yyidx >= 0) 
      $this->yy_pop_parser_stack();

#line 23 "CSS3Parser.y"
 throw new ParceTokenException('Parse failure: '.$yyminor->value,$yymajor,0,'',$yyminor->line); 
#line 634 "CSS3Parser.php"
  }

  private function yy_syntax_error($yymajor, $yyminor)
  {
    $message = 'Unexpected ' . $this->yy_token_name($yymajor) . '(' . $yyminor . ')';
#line 21 "CSS3Parser.y"
 throw new ParceTokenException('Syntax error: '.$yyminor->value,$yymajor,0,'',$yyminor->line); 
#line 642 "CSS3Parser.php"
  }

  private function yy_accept()
  {
    if ($this->yyTraceFILE)
      fprintf($this->yyTraceFILE, "%sAccept!\n", $this->yyTracePrompt);

    while ($this->yyidx >= 0) 
      $this->yy_pop_parser_stack();
  }

  public function doParse($yymajor, $yyminor = null) 
  {
    $yyact = 0; /* The parser action. */
    $yyendofinput = 0; /* True if we are at the end of input */
    $yyerrorhit = 0; /* True if yymajor has invoked an error */

    /* (re)initialize the parser, if necessary */
    if ($this->yyidx < 0) 
    {
      $this->yyidx = 0;
      $this->yyerrcnt = - 1;
      $ent = new stdClass;
      $ent->stateno = 0;
      $ent->major = 0;
      $ent->minor = null;
      $this->yystack = array(0 => $ent);
      $this->YY_NO_ACTION = self::YYNSTATE + self::YYNRULE + 2;
      $this->YY_ACCEPT_ACTION = self::YYNSTATE + self::YYNRULE + 1;
      $this->YY_ERROR_ACTION = self::YYNSTATE + self::YYNRULE;
    }

    $yyendofinput = ($yymajor == 0);

    if ($this->yyTraceFILE) 
      fprintf($this->yyTraceFILE, "%sInput %s\n", $this->yyTracePrompt, self::$yyTokenName[$yymajor]);

    do 
    {
      $yyact = $this->yy_find_shift_action($yymajor);

      if ($yyact < self::YYNSTATE) 
      {
        $this->yy_shift($yyact, $yymajor, $yyminor);
        $this->yyerrcnt--;

        if ($yyendofinput && $this->yyidx >= 0) 
          $yymajor = 0;
        else
          $yymajor = self::YYNOCODE;
      } 
      else if ($yyact < self::YYNSTATE + self::YYNRULE) 
      {
        $this->yy_reduce($yyact - self::YYNSTATE);
      }
      else if ($yyact == $this->YY_ERROR_ACTION) 
      {
        if ($this->yyTraceFILE) 
          fprintf($this->yyTraceFILE, "%sSyntax Error!\n", $this->yyTracePrompt);

        if (defined('self::YYERRORSYMBOL')) 
        {
          if ($this->yyerrcnt < 0) 
            $this->yy_syntax_error($yymajor, $yyminor);

          $yymx = $this->yystack[$this->yyidx]->major;

          if ($yymx == self::YYERRORSYMBOL || $yyerrorhit) 
          {
            if ($this->yyTraceFILE) 
              fprintf($this->yyTraceFILE, "%sDiscard input token %s\n", $this->yyTracePrompt, self::$yyTokenName[$yymajor]);

            $this->yy_destructor($yymajor, $yyminor);
            $yymajor = self::YYNOCODE;
          }
          else
          {
            while ($this->yyidx >= 0 && $yymx != self::YYERRORSYMBOL && ($yyact = $this->yy_find_reduce_action($this->yystack[$this->yyidx]->stateno, self::YYERRORSYMBOL)) >= self::YYNSTATE) 
              $this->yy_pop_parser_stack();

            if ($this->yyidx < 0 || $yymajor == 0) 
            {
              $this->yy_destructor($yymajor, $yyminor);
              $this->yy_parse_failed();
              $yymajor = self::YYNOCODE;
            }
            else if ($yymx != self::YYERRORSYMBOL) 
            {
              $this->yy_shift($yyact, self::YYERRORSYMBOL, 0);
            }
          }

          $yypParser->yyerrcnt = 3;
          $yyerrorhit = 1;
        }
        else
        { 
          if ($this->yyerrcnt <= 0) 
            $this->yy_syntax_error($yymajor, $yyminor);

          $this->yyerrcnt = 3;
          $this->yy_destructor($yymajor, $yyminor);

          if ($yyendofinput) 
            $this->yy_parse_failed();

          $yymajor = self::YYNOCODE;
        }
      }
      else
      {
        $this->yy_accept();
        $yymajor = self::YYNOCODE;
      }
    }
    while ($yymajor != self::YYNOCODE && $this->yyidx >= 0);
  }
}
