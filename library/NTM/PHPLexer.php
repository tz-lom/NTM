<?php
namespace NTM;
class PHPReadTokenException extends \Exception {}


class PHPLexer extends JLexBase  {
	const YY_BUFFER_SIZE = 512;
	const YY_F = -1;
	const YY_NO_STATE = -1;
	const YY_NOT_ACCEPT = 0;
	const YY_START = 1;
	const YY_END = 2;
	const YY_NO_ANCHOR = 4;
	const YY_BOL = 256;
	var $YY_EOF = 257;
	protected $yy_count_chars = true;
	protected $yy_count_lines = true;

	function __construct($stream) {
		parent::__construct($stream);
		$this->yy_lexical_state = self::YYINITIAL;
	}

	const YYINITIAL = 0;
	const COMMENT = 1;
	const HEREDOC = 3;
	const PHP = 2;
	static $yy_state_dtrans = array(
		0,
		26,
		28,
		38
	);
	static $yy_acpt = array(
		/* 0 */ self::YY_NOT_ACCEPT,
		/* 1 */ self::YY_NO_ANCHOR,
		/* 2 */ self::YY_NO_ANCHOR,
		/* 3 */ self::YY_NO_ANCHOR,
		/* 4 */ self::YY_NO_ANCHOR,
		/* 5 */ self::YY_NO_ANCHOR,
		/* 6 */ self::YY_NO_ANCHOR,
		/* 7 */ self::YY_NO_ANCHOR,
		/* 8 */ self::YY_NO_ANCHOR,
		/* 9 */ self::YY_NO_ANCHOR,
		/* 10 */ self::YY_NO_ANCHOR,
		/* 11 */ self::YY_NO_ANCHOR,
		/* 12 */ self::YY_NO_ANCHOR,
		/* 13 */ self::YY_NO_ANCHOR,
		/* 14 */ self::YY_NO_ANCHOR,
		/* 15 */ self::YY_NO_ANCHOR,
		/* 16 */ self::YY_NO_ANCHOR,
		/* 17 */ self::YY_NO_ANCHOR,
		/* 18 */ self::YY_NOT_ACCEPT,
		/* 19 */ self::YY_NO_ANCHOR,
		/* 20 */ self::YY_NO_ANCHOR,
		/* 21 */ self::YY_NO_ANCHOR,
		/* 22 */ self::YY_NO_ANCHOR,
		/* 23 */ self::YY_NO_ANCHOR,
		/* 24 */ self::YY_NOT_ACCEPT,
		/* 25 */ self::YY_NO_ANCHOR,
		/* 26 */ self::YY_NOT_ACCEPT,
		/* 27 */ self::YY_NO_ANCHOR,
		/* 28 */ self::YY_NOT_ACCEPT,
		/* 29 */ self::YY_NO_ANCHOR,
		/* 30 */ self::YY_NOT_ACCEPT,
		/* 31 */ self::YY_NO_ANCHOR,
		/* 32 */ self::YY_NOT_ACCEPT,
		/* 33 */ self::YY_NO_ANCHOR,
		/* 34 */ self::YY_NOT_ACCEPT,
		/* 35 */ self::YY_NOT_ACCEPT,
		/* 36 */ self::YY_NOT_ACCEPT,
		/* 37 */ self::YY_NOT_ACCEPT,
		/* 38 */ self::YY_NOT_ACCEPT
	);
		static $yy_cmap = array(
 7, 7, 7, 7, 7, 7, 7, 7, 7, 7, 12, 7, 7, 17, 7, 7, 7, 7, 7, 7,
 7, 7, 7, 7, 7, 7, 7, 7, 7, 7, 7, 7, 7, 7, 10, 7, 7, 7, 7, 13,
 7, 7, 8, 7, 7, 7, 7, 6, 15, 15, 15, 15, 15, 15, 15, 15, 15, 15, 7, 16,
 1, 5, 9, 2, 7, 14, 14, 14, 14, 14, 14, 14, 14, 14, 14, 14, 14, 14, 14, 14,
 14, 14, 14, 14, 14, 14, 14, 14, 14, 14, 14, 7, 11, 7, 7, 7, 7, 14, 14, 14,
 14, 14, 14, 14, 4, 14, 14, 14, 14, 14, 14, 14, 3, 14, 14, 14, 14, 14, 14, 14,
 14, 14, 14, 7, 7, 7, 7, 7, 7, 7, 7, 7, 7, 7, 7, 7, 7, 7, 7, 7,
 7, 7, 7, 7, 7, 7, 7, 7, 7, 7, 7, 7, 7, 7, 7, 7, 7, 7, 7, 7,
 7, 7, 7, 7, 7, 7, 7, 7, 7, 7, 7, 7, 7, 7, 7, 7, 7, 7, 7, 7,
 7, 7, 7, 7, 7, 7, 7, 7, 7, 7, 7, 7, 7, 7, 7, 7, 7, 7, 7, 7,
 7, 7, 7, 7, 7, 7, 7, 7, 7, 7, 7, 7, 7, 7, 7, 7, 7, 7, 7, 7,
 7, 7, 7, 7, 7, 7, 7, 7, 7, 7, 7, 7, 7, 7, 7, 7, 7, 7, 7, 7,
 7, 7, 7, 7, 7, 7, 7, 7, 7, 7, 7, 7, 7, 7, 7, 7, 0, 0,);

		static $yy_rmap = array(
 0, 1, 2, 3, 1, 1, 1, 4, 1, 5, 1, 1, 1, 1, 6, 1, 7, 1, 8, 1,
 9, 10, 11, 1, 12, 1, 13, 14, 15, 16, 17, 18, 18, 10, 19, 10, 20, 21, 22,);

		static $yy_nxt = array(
array(
 1, 2, 19, 19, 19, 19, 19, 19, 19, 19, 19, 19, 19, 19, 19, 19, 19, 19,
),
array(
 -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1,
),
array(
 -1, -1, 3, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1,
),
array(
 -1, -1, -1, 18, -1, 4, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1,
),
array(
 -1, 30, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1,
),
array(
 -1, 9, 9, 9, 9, 9, 9, 9, 9, 9, 9, 9, -1, 9, 9, 9, 9, -1,
),
array(
 -1, -1, -1, 14, 14, -1, -1, -1, -1, -1, -1, -1, -1, -1, 14, 14, -1, -1,
),
array(
 -1, -1, -1, 16, 16, -1, -1, -1, -1, -1, -1, -1, -1, -1, 16, 16, 23, -1,
),
array(
 -1, -1, -1, -1, 24, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1,
),
array(
 -1, -1, -1, -1, -1, -1, -1, -1, -1, 8, -1, -1, -1, -1, -1, -1, -1, -1,
),
array(
 -1, 35, 35, 35, 35, 35, 35, 35, 35, 35, 35, 36, 35, 13, 35, 35, 35, 35,
),
array(
 -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, 17, -1, -1, -1, -1, -1,
),
array(
 -1, -1, -1, 5, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1,
),
array(
 1, 6, 6, 6, 6, 6, 6, 6, 6, 6, 6, 6, 6, 6, 6, 6, 6, 6,
),
array(
 -1, -1, -1, -1, -1, -1, 9, -1, 10, -1, -1, -1, -1, -1, -1, -1, -1, -1,
),
array(
 1, 7, 20, 25, 25, 25, 27, 25, 29, 25, 31, 25, 25, 33, 25, 25, 25, 25,
),
array(
 -1, -1, -1, -1, -1, -1, 11, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1,
),
array(
 -1, 37, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1,
),
array(
 -1, 32, 32, 32, 32, 32, 32, 32, 32, 32, 12, 34, 32, 32, 32, 32, 32, 32,
),
array(
 -1, 32, 32, 32, 32, 32, 32, 32, 32, 32, 32, 32, -1, 32, 32, 32, 32, -1,
),
array(
 -1, 35, 35, 35, 35, 35, 35, 35, 35, 35, 35, 36, 35, 21, 35, 35, 35, 35,
),
array(
 -1, -1, -1, 14, 14, -1, -1, -1, -1, -1, -1, -1, -1, -1, 14, -1, -1, -1,
),
array(
 1, 15, 15, 16, 16, 15, 15, 15, 15, 15, 15, 15, 17, 15, 16, 15, 15, 22,
),
);

	public function /*Yytoken*/ nextToken ()
 {
		$yy_anchor = self::YY_NO_ANCHOR;
		$yy_state = self::$yy_state_dtrans[$this->yy_lexical_state];
		$yy_next_state = self::YY_NO_STATE;
		$yy_last_accept_state = self::YY_NO_STATE;
		$yy_initial = true;

		$this->yy_mark_start();
		$yy_this_accept = self::$yy_acpt[$yy_state];
		if (self::YY_NOT_ACCEPT != $yy_this_accept) {
			$yy_last_accept_state = $yy_state;
			$this->yy_mark_end();
		}
		while (true) {
			if ($yy_initial && $this->yy_at_bol) $yy_lookahead = self::YY_BOL;
			else $yy_lookahead = $this->yy_advance();
			$yy_next_state = self::$yy_nxt[self::$yy_rmap[$yy_state]][self::$yy_cmap[$yy_lookahead]];
			if ($this->YY_EOF == $yy_lookahead && true == $yy_initial) {
				return null;
			}
			if (self::YY_F != $yy_next_state) {
				$yy_state = $yy_next_state;
				$yy_initial = false;
				$yy_this_accept = self::$yy_acpt[$yy_state];
				if (self::YY_NOT_ACCEPT != $yy_this_accept) {
					$yy_last_accept_state = $yy_state;
					$this->yy_mark_end();
				}
			}
			else {
				if (self::YY_NO_STATE == $yy_last_accept_state) {
					throw new Exception("Lexical Error: Unmatched Input.");
				}
				else {
					$yy_anchor = self::$yy_acpt[$yy_last_accept_state];
					if (0 != (self::YY_END & $yy_anchor)) {
						$this->yy_move_end();
					}
					$this->yy_to_mark();
					switch ($yy_last_accept_state) {
						case 1:
							
						case -2:
							break;
						case 2:
							{ return $this->createToken(false); }
						case -3:
							break;
						case 3:
							{ $this->yybegin(self::PHP); return $this->createToken(true); }
						case -4:
							break;
						case 4:
							{ $this->yybegin(self::PHP); return $this->createToken(true); }
						case -5:
							break;
						case 5:
							{ $this->yybegin(self::PHP); return $this->createToken(true); }
						case -6:
							break;
						case 6:
							{ return $this->createToken(true); }
						case -7:
							break;
						case 7:
							{ return $this->createToken(true); }
						case -8:
							break;
						case 8:
							{ $this->yybegin(self::YYINITIAL); return $this->createToken(true);  }
						case -9:
							break;
						case 9:
							{ return $this->createToken(true); }
						case -10:
							break;
						case 10:
							{ $this->yybegin(self::COMMENT); return $this->createToken(true); }
						case -11:
							break;
						case 11:
							{ $this->yybegin(self::PHP); return $this->createToken(true); }
						case -12:
							break;
						case 12:
							{ return $this->createToken(true); }
						case -13:
							break;
						case 13:
							{ return $this->createToken(true); }
						case -14:
							break;
						case 14:
							{ 
                                              $this->yybegin(self::HEREDOC);
                                              $tok = $this->createToken(true);
                                              $this->mem_heredoc = substr($tok->value,3);
                                              $this->mem_here_ret = false;
                                              $this->mem_heredoc_appeared = false;
                                              return $tok;
                                            }
						case -15:
							break;
						case 15:
							{ $this->mem_here_ret = false; $this->mem_heredoc_appeared = false; return $this->createToken(true); }
						case -16:
							break;
						case 16:
							{ 
                                              $tok = $this->createToken(true);
                                              if($this->mem_here_ret && 
                                                    (
                                                        (substr($tok->value,0,-1)==$this->mem_heredoc) ||
                                                        ($tok->value==$this->mem_heredoc)
                                                    )) $this->mem_heredoc_appeared = true;
                                              else
                                                $this->mem_heredoc_appeared = false;
                                              return $tok;
                                            }
						case -17:
							break;
						case 17:
							{
                                              $tok = $this->createToken(true);
                                              $this->mem_here_ret = true;
                                              if($this->mem_heredoc_appeared == true)
                                              {
                                                $this->yybegin(self::PHP);
                                              }
                                              $this->ret_heredoc_appeared = false;
                                              return $tok;
                                            }
						case -18:
							break;
						case 19:
							{ return $this->createToken(false); }
						case -19:
							break;
						case 20:
							{ return $this->createToken(true); }
						case -20:
							break;
						case 21:
							{ return $this->createToken(true); }
						case -21:
							break;
						case 22:
							{ $this->mem_here_ret = false; $this->mem_heredoc_appeared = false; return $this->createToken(true); }
						case -22:
							break;
						case 23:
							{ 
                                              $tok = $this->createToken(true);
                                              if($this->mem_here_ret && 
                                                    (
                                                        (substr($tok->value,0,-1)==$this->mem_heredoc) ||
                                                        ($tok->value==$this->mem_heredoc)
                                                    )) $this->mem_heredoc_appeared = true;
                                              else
                                                $this->mem_heredoc_appeared = false;
                                              return $tok;
                                            }
						case -23:
							break;
						case 25:
							{ return $this->createToken(true); }
						case -24:
							break;
						case 27:
							{ return $this->createToken(true); }
						case -25:
							break;
						case 29:
							{ return $this->createToken(true); }
						case -26:
							break;
						case 31:
							{ return $this->createToken(true); }
						case -27:
							break;
						case 33:
							{ return $this->createToken(true); }
						case -28:
							break;
						default:
						$this->yy_error('INTERNAL',false);
					case -1:
					}
					$yy_initial = true;
					$yy_state = self::$yy_state_dtrans[$this->yy_lexical_state];
					$yy_next_state = self::YY_NO_STATE;
					$yy_last_accept_state = self::YY_NO_STATE;
					$this->yy_mark_start();
					$yy_this_accept = self::$yy_acpt[$yy_state];
					if (self::YY_NOT_ACCEPT != $yy_this_accept) {
						$yy_last_accept_state = $yy_state;
						$this->yy_mark_end();
					}
				}
			}
		}
	}
}
