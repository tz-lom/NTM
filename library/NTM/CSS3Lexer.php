<?php
namespace NTM;
class ReadTokenException extends \Exception {}
function createToken($token,$value,$obj)
{
    $t = $obj->createToken($token);
    $t->value = $value;
    return $t;
}


class CSS3Lexer extends JLexBase  {
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
	static $yy_state_dtrans = array(
		0,
		78
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
		/* 18 */ self::YY_NO_ANCHOR,
		/* 19 */ self::YY_NO_ANCHOR,
		/* 20 */ self::YY_NO_ANCHOR,
		/* 21 */ self::YY_NO_ANCHOR,
		/* 22 */ self::YY_NO_ANCHOR,
		/* 23 */ self::YY_NO_ANCHOR,
		/* 24 */ self::YY_NO_ANCHOR,
		/* 25 */ self::YY_NO_ANCHOR,
		/* 26 */ self::YY_NO_ANCHOR,
		/* 27 */ self::YY_NO_ANCHOR,
		/* 28 */ self::YY_NO_ANCHOR,
		/* 29 */ self::YY_NO_ANCHOR,
		/* 30 */ self::YY_NO_ANCHOR,
		/* 31 */ self::YY_NO_ANCHOR,
		/* 32 */ self::YY_NOT_ACCEPT,
		/* 33 */ self::YY_NO_ANCHOR,
		/* 34 */ self::YY_NO_ANCHOR,
		/* 35 */ self::YY_NO_ANCHOR,
		/* 36 */ self::YY_NO_ANCHOR,
		/* 37 */ self::YY_NO_ANCHOR,
		/* 38 */ self::YY_NO_ANCHOR,
		/* 39 */ self::YY_NO_ANCHOR,
		/* 40 */ self::YY_NO_ANCHOR,
		/* 41 */ self::YY_NO_ANCHOR,
		/* 42 */ self::YY_NO_ANCHOR,
		/* 43 */ self::YY_NOT_ACCEPT,
		/* 44 */ self::YY_NO_ANCHOR,
		/* 45 */ self::YY_NO_ANCHOR,
		/* 46 */ self::YY_NO_ANCHOR,
		/* 47 */ self::YY_NO_ANCHOR,
		/* 48 */ self::YY_NO_ANCHOR,
		/* 49 */ self::YY_NOT_ACCEPT,
		/* 50 */ self::YY_NO_ANCHOR,
		/* 51 */ self::YY_NO_ANCHOR,
		/* 52 */ self::YY_NO_ANCHOR,
		/* 53 */ self::YY_NO_ANCHOR,
		/* 54 */ self::YY_NO_ANCHOR,
		/* 55 */ self::YY_NOT_ACCEPT,
		/* 56 */ self::YY_NO_ANCHOR,
		/* 57 */ self::YY_NO_ANCHOR,
		/* 58 */ self::YY_NO_ANCHOR,
		/* 59 */ self::YY_NO_ANCHOR,
		/* 60 */ self::YY_NOT_ACCEPT,
		/* 61 */ self::YY_NO_ANCHOR,
		/* 62 */ self::YY_NOT_ACCEPT,
		/* 63 */ self::YY_NO_ANCHOR,
		/* 64 */ self::YY_NOT_ACCEPT,
		/* 65 */ self::YY_NO_ANCHOR,
		/* 66 */ self::YY_NOT_ACCEPT,
		/* 67 */ self::YY_NO_ANCHOR,
		/* 68 */ self::YY_NOT_ACCEPT,
		/* 69 */ self::YY_NOT_ACCEPT,
		/* 70 */ self::YY_NOT_ACCEPT,
		/* 71 */ self::YY_NOT_ACCEPT,
		/* 72 */ self::YY_NOT_ACCEPT,
		/* 73 */ self::YY_NOT_ACCEPT,
		/* 74 */ self::YY_NOT_ACCEPT,
		/* 75 */ self::YY_NOT_ACCEPT,
		/* 76 */ self::YY_NOT_ACCEPT,
		/* 77 */ self::YY_NOT_ACCEPT,
		/* 78 */ self::YY_NOT_ACCEPT,
		/* 79 */ self::YY_NO_ANCHOR,
		/* 80 */ self::YY_NO_ANCHOR,
		/* 81 */ self::YY_NO_ANCHOR,
		/* 82 */ self::YY_NO_ANCHOR,
		/* 83 */ self::YY_NOT_ACCEPT,
		/* 84 */ self::YY_NOT_ACCEPT,
		/* 85 */ self::YY_NOT_ACCEPT,
		/* 86 */ self::YY_NO_ANCHOR,
		/* 87 */ self::YY_NO_ANCHOR,
		/* 88 */ self::YY_NO_ANCHOR,
		/* 89 */ self::YY_NO_ANCHOR,
		/* 90 */ self::YY_NO_ANCHOR,
		/* 91 */ self::YY_NO_ANCHOR,
		/* 92 */ self::YY_NO_ANCHOR,
		/* 93 */ self::YY_NO_ANCHOR,
		/* 94 */ self::YY_NO_ANCHOR,
		/* 95 */ self::YY_NO_ANCHOR,
		/* 96 */ self::YY_NO_ANCHOR,
		/* 97 */ self::YY_NO_ANCHOR,
		/* 98 */ self::YY_NO_ANCHOR,
		/* 99 */ self::YY_NO_ANCHOR,
		/* 100 */ self::YY_NO_ANCHOR
	);
		static $yy_cmap = array(
 3, 3, 3, 3, 3, 3, 3, 3, 3, 18, 4, 3, 5, 17, 3, 3, 3, 3, 3, 3,
 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 18, 3, 19, 23, 10, 3, 3, 20,
 21, 22, 2, 24, 26, 12, 11, 1, 15, 15, 15, 15, 15, 15, 15, 15, 15, 15, 27, 3,
 3, 7, 25, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3,
 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 31, 14, 32, 9, 13, 3, 16, 16, 16,
 16, 16, 16, 13, 13, 13, 13, 13, 13, 13, 28, 29, 13, 13, 13, 13, 30, 13, 13, 13,
 13, 13, 13, 3, 8, 3, 6, 3, 13, 13, 13, 13, 13, 13, 13, 13, 13, 13, 13, 13,
 13, 13, 13, 13, 13, 13, 13, 13, 13, 13, 13, 13, 13, 13, 13, 13, 13, 13, 13, 13,
 13, 13, 13, 13, 13, 13, 13, 13, 13, 13, 13, 13, 13, 13, 13, 13, 13, 13, 13, 13,
 13, 13, 13, 13, 13, 13, 13, 13, 13, 13, 13, 13, 13, 13, 13, 13, 13, 13, 13, 13,
 13, 13, 13, 13, 13, 13, 13, 13, 13, 13, 13, 13, 13, 13, 13, 13, 13, 13, 13, 13,
 13, 13, 13, 13, 13, 13, 13, 13, 13, 13, 13, 13, 13, 13, 13, 13, 13, 13, 13, 13,
 13, 13, 13, 13, 13, 13, 13, 13, 13, 13, 13, 13, 13, 13, 13, 13, 0, 0,);

		static $yy_rmap = array(
 0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 1, 11, 12, 13, 14, 15, 1, 1, 16,
 17, 18, 19, 20, 21, 22, 1, 23, 24, 25, 1, 1, 3, 1, 26, 27, 28, 29, 30, 31,
 32, 33, 34, 7, 35, 36, 37, 38, 39, 35, 40, 41, 42, 43, 44, 40, 45, 46, 47, 48,
 49, 50, 51, 49, 52, 53, 50, 23, 54, 55, 53, 56, 57, 58, 59, 60, 61, 62, 63, 64,
 65, 66, 67, 68, 69, 70, 71, 72, 73, 74, 75, 76, 77, 78, 79, 80, 81, 41, 42, 82,
 44,);

		static $yy_nxt = array(
array(
 1, 2, 3, 33, 4, 4, 5, 6, 7, 44, 50, 56, 8, 9, 61, 10, 9, 4, 4, 63,
 65, 33, 11, 67, 12, 13, 14, 15, 9, 9, 9, 16, 17,
),
array(
 -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1,
 -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1,
),
array(
 -1, -1, 18, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1,
 -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1,
),
array(
 -1, -1, -1, -1, -1, -1, -1, 19, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1,
 -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1,
),
array(
 -1, -1, 32, -1, 4, 4, 5, 6, 43, 49, 55, -1, 35, -1, -1, -1, -1, 4, 4, 60,
 -1, -1, 11, -1, 12, 13, 14, -1, -1, -1, -1, -1, 17,
),
array(
 -1, -1, -1, -1, 34, 34, -1, 20, -1, -1, -1, -1, -1, -1, -1, -1, -1, 34, 34, -1,
 -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1,
),
array(
 -1, -1, -1, -1, 6, 6, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, 6, 6, -1,
 -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1,
),
array(
 -1, -1, -1, -1, -1, -1, -1, 21, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1,
 -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1,
),
array(
 -1, -1, -1, -1, 35, 35, -1, -1, -1, -1, -1, -1, -1, 9, 66, -1, 9, 35, 35, -1,
 -1, -1, -1, -1, -1, -1, -1, -1, 9, 9, 9, -1, -1,
),
array(
 -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, 9, 9, 84, 9, 9, -1, -1, -1,
 -1, 25, -1, -1, -1, -1, -1, -1, 9, 9, 9, -1, -1,
),
array(
 -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, 68, -1, -1, -1, 10, -1, -1, -1, -1,
 -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1,
),
array(
 -1, -1, -1, -1, 12, 12, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, 12, 12, -1,
 -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1,
),
array(
 -1, -1, -1, -1, 13, 13, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, 13, 13, -1,
 -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1,
),
array(
 -1, -1, -1, -1, 14, 14, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, 14, 14, -1,
 -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1,
),
array(
 -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1,
 -1, -1, -1, -1, -1, -1, -1, -1, 73, -1, -1, -1, -1,
),
array(
 -1, -1, -1, -1, 16, 16, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, 16, 16, -1,
 -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1,
),
array(
 -1, -1, -1, -1, 19, 19, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, 19, 19, -1,
 -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1,
),
array(
 -1, -1, -1, -1, 20, 20, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, 20, 20, -1,
 -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1,
),
array(
 -1, -1, -1, -1, 21, 21, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, 21, 21, -1,
 -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1,
),
array(
 -1, -1, -1, -1, 22, 22, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, 22, 22, -1,
 -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1,
),
array(
 -1, -1, -1, -1, 23, 23, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, 23, 23, -1,
 -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1,
),
array(
 -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, 24, 24, 83, 24, 24, -1, -1, -1,
 -1, -1, -1, -1, -1, -1, -1, -1, 24, 24, 24, -1, -1,
),
array(
 -1, -1, -1, -1, 25, 25, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, 25, 25, -1,
 -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1,
),
array(
 -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, 27, 27, 72, 27, 27, -1, -1, -1,
 -1, -1, -1, -1, -1, -1, -1, -1, 27, 27, 27, -1, -1,
),
array(
 -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, 28, 28, 85, 28, 28, -1, -1, -1,
 -1, -1, -1, -1, -1, -1, -1, -1, 28, 28, 28, -1, -1,
),
array(
 -1, -1, -1, -1, 29, 29, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, 29, 29, -1,
 -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1,
),
array(
 -1, -1, -1, -1, 34, 34, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, 34, 34, -1,
 -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1,
),
array(
 -1, -1, -1, -1, 35, 35, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, 35, 35, -1,
 -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1,
),
array(
 -1, -1, -1, -1, 9, 9, -1, -1, -1, -1, -1, -1, 9, 9, 84, 97, 97, 45, 9, -1,
 -1, 25, -1, -1, -1, -1, -1, -1, 9, 9, 9, -1, -1,
),
array(
 -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, 74, 28, 75, 37, 28, -1, -1, -1,
 -1, -1, -1, -1, -1, -1, -1, -1, 28, 28, 28, -1, -1,
),
array(
 -1, -1, -1, -1, 24, 24, -1, -1, -1, -1, -1, -1, 24, 24, 83, 98, 98, 46, 24, -1,
 -1, -1, -1, -1, -1, -1, -1, -1, 24, 24, 24, -1, -1,
),
array(
 -1, 70, 70, 70, 39, 39, 70, 70, 70, 70, 70, 70, 70, 70, 71, 70, 70, 39, 39, -1,
 39, 70, 70, 70, 70, 70, 70, 70, 70, 70, 70, 70, 70,
),
array(
 -1, -1, -1, -1, 27, 27, -1, -1, -1, -1, -1, -1, 27, 27, 72, 99, 99, 47, 27, -1,
 -1, -1, -1, -1, -1, -1, -1, -1, 27, 27, 27, -1, -1,
),
array(
 -1, -1, -1, -1, 28, 28, -1, -1, -1, -1, -1, -1, 28, 28, 85, 100, 100, 48, 28, -1,
 -1, -1, -1, -1, -1, -1, -1, -1, 28, 28, 28, -1, -1,
),
array(
 -1, 31, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1,
 -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1,
),
array(
 -1, -1, -1, -1, -1, -1, -1, 22, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1,
 -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1,
),
array(
 -1, -1, -1, -1, 9, -1, -1, -1, -1, -1, -1, -1, 9, 9, 84, 9, 9, -1, -1, -1,
 -1, 25, -1, -1, -1, -1, -1, -1, 9, 9, 9, -1, -1,
),
array(
 -1, -1, -1, -1, 24, -1, -1, -1, -1, -1, -1, -1, 24, 24, 83, 24, 24, -1, -1, -1,
 -1, -1, -1, -1, -1, -1, -1, -1, 24, 24, 24, -1, -1,
),
array(
 -1, -1, -1, -1, 27, -1, -1, -1, -1, -1, -1, -1, 27, 27, 72, 27, 27, -1, -1, -1,
 -1, -1, -1, -1, -1, -1, -1, -1, 27, 27, 27, -1, -1,
),
array(
 -1, -1, -1, -1, 28, -1, -1, -1, -1, -1, -1, -1, 28, 28, 85, 28, 28, -1, -1, -1,
 -1, -1, -1, -1, -1, -1, -1, -1, 28, 28, 28, -1, -1,
),
array(
 -1, -1, -1, -1, -1, -1, -1, 23, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1,
 -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1,
),
array(
 -1, -1, -1, -1, 9, 9, -1, -1, -1, -1, -1, -1, 9, 9, 84, 93, 93, 45, 9, -1,
 -1, 25, -1, -1, -1, -1, -1, -1, 9, 9, 9, -1, -1,
),
array(
 -1, -1, -1, -1, 24, 24, -1, -1, -1, -1, -1, -1, 24, 24, 83, 94, 94, 46, 24, -1,
 -1, -1, -1, -1, -1, -1, -1, -1, 24, 24, 24, -1, -1,
),
array(
 -1, -1, -1, -1, 27, 27, -1, -1, -1, -1, -1, -1, 27, 27, 72, 27, 27, 47, 27, -1,
 -1, -1, -1, -1, -1, -1, -1, -1, 27, 27, 27, -1, -1,
),
array(
 -1, -1, -1, -1, 28, 28, -1, -1, -1, -1, -1, -1, 28, 28, 85, 96, 96, 48, 28, -1,
 -1, -1, -1, -1, -1, -1, -1, -1, 28, 28, 28, -1, -1,
),
array(
 -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, 62, 24, 64, 37, 24, -1, -1, -1,
 -1, -1, -1, -1, -1, -1, -1, -1, 24, 24, 24, -1, -1,
),
array(
 -1, -1, -1, -1, 9, 9, -1, -1, -1, -1, -1, -1, 9, 9, 84, 9, 9, 45, 9, -1,
 -1, 25, -1, -1, -1, -1, -1, -1, 9, 9, 9, -1, -1,
),
array(
 -1, -1, -1, -1, 24, 24, -1, -1, -1, -1, -1, -1, 24, 24, 83, 24, 24, 46, 24, -1,
 -1, -1, -1, -1, -1, -1, -1, -1, 24, 24, 24, -1, -1,
),
array(
 -1, -1, -1, -1, 28, 28, -1, -1, -1, -1, -1, -1, 28, 28, 85, 28, 28, 48, 28, -1,
 -1, -1, -1, -1, -1, -1, -1, -1, 28, 28, 28, -1, -1,
),
array(
 -1, 60, 60, 60, 60, 60, 60, 60, 60, 60, 60, 60, 60, 60, 69, 60, 60, 60, 60, 26,
 60, 60, 60, 60, 60, 60, 60, 60, 60, 60, 60, 60, 60,
),
array(
 -1, 9, 9, 9, -1, -1, 9, 9, 9, 9, 9, 9, 9, 9, 9, 36, 36, -1, 9, 9,
 9, 9, 9, 9, 9, 9, 9, 9, 9, 9, 9, 9, 9,
),
array(
 -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, 24, 64, -1, 24, -1, -1, -1,
 -1, -1, -1, -1, -1, -1, -1, -1, 24, 24, 24, -1, -1,
),
array(
 -1, 24, 24, 24, -1, -1, 24, 24, 24, 24, 24, 24, 24, 24, 24, 38, 38, -1, 24, 24,
 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24,
),
array(
 -1, 70, 70, 70, 70, 70, 70, 70, 70, 70, 70, 70, 70, 70, 71, 70, 70, 70, 70, -1,
 39, 70, 70, 70, 70, 70, 70, 70, 70, 70, 70, 70, 70,
),
array(
 -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, 37, -1, -1, -1, -1,
 -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1,
),
array(
 -1, 60, 60, 60, -1, 60, 60, 60, 60, 60, 60, 60, 60, 60, 60, 60, 60, -1, 60, 60,
 60, 60, 60, 60, 60, 60, 60, 60, 60, 60, 60, 60, 60,
),
array(
 -1, 70, 70, 70, -1, 70, 70, 70, 70, 70, 70, 70, 70, 70, 70, 70, 70, -1, 70, 70,
 70, 70, 70, 70, 70, 70, 70, 70, 70, 70, 70, 70, 70,
),
array(
 -1, 27, 27, 27, -1, -1, 27, 27, 27, 27, 27, 27, 27, 27, 27, 40, 40, -1, 27, 27,
 27, 27, 27, 27, 27, 27, 27, 27, 27, 27, 27, 27, 27,
),
array(
 -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1,
 -1, -1, -1, -1, -1, -1, -1, -1, -1, 76, -1, -1, -1,
),
array(
 -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, 28, 75, -1, 28, -1, -1, -1,
 -1, -1, -1, -1, -1, -1, -1, -1, 28, 28, 28, -1, -1,
),
array(
 -1, 28, 28, 28, -1, -1, 28, 28, 28, 28, 28, 28, 28, 28, 28, 41, 41, -1, 28, 28,
 28, 28, 28, 28, 28, 28, 28, 28, 28, 28, 28, 28, 28,
),
array(
 -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1,
 -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, 77, -1, -1,
),
array(
 -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1,
 -1, 29, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1,
),
array(
 1, 30, 42, 30, 30, 30, 30, 30, 30, 30, 30, 30, 30, 30, 30, 30, 30, 30, 30, 30,
 30, 30, 30, 30, 30, 30, 30, 30, 30, 30, 30, 30, 30,
),
array(
 -1, -1, -1, -1, 9, 9, -1, -1, -1, -1, -1, -1, 9, 9, 84, 51, 51, 45, 9, -1,
 -1, 25, -1, -1, -1, -1, -1, -1, 9, 9, 9, -1, -1,
),
array(
 -1, -1, -1, -1, 24, 24, -1, -1, -1, -1, -1, -1, 24, 24, 83, 52, 52, 46, 24, -1,
 -1, -1, -1, -1, -1, -1, -1, -1, 24, 24, 24, -1, -1,
),
array(
 -1, -1, -1, -1, 27, 27, -1, -1, -1, -1, -1, -1, 27, 27, 72, 53, 53, 47, 27, -1,
 -1, -1, -1, -1, -1, -1, -1, -1, 27, 27, 27, -1, -1,
),
array(
 -1, -1, -1, -1, 28, 28, -1, -1, -1, -1, -1, -1, 28, 28, 85, 54, 54, 48, 28, -1,
 -1, -1, -1, -1, -1, -1, -1, -1, 28, 28, 28, -1, -1,
),
array(
 -1, 24, 24, 24, -1, -1, 24, 24, 24, 24, 24, 24, 24, 24, 24, 80, 80, -1, 24, 24,
 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24, 24,
),
array(
 -1, 9, 9, 9, -1, -1, 9, 9, 9, 9, 9, 9, 9, 9, 9, 79, 79, -1, 9, 9,
 9, 9, 9, 9, 9, 9, 9, 9, 9, 9, 9, 9, 9,
),
array(
 -1, 28, 28, 28, -1, -1, 28, 28, 28, 28, 28, 28, 28, 28, 28, 82, 82, -1, 28, 28,
 28, 28, 28, 28, 28, 28, 28, 28, 28, 28, 28, 28, 28,
),
array(
 -1, -1, -1, -1, 9, 9, -1, -1, -1, -1, -1, -1, 9, 9, 84, 57, 57, 45, 9, -1,
 -1, 25, -1, -1, -1, -1, -1, -1, 9, 9, 9, -1, -1,
),
array(
 -1, -1, -1, -1, 24, 24, -1, -1, -1, -1, -1, -1, 24, 24, 83, 58, 58, 46, 24, -1,
 -1, -1, -1, -1, -1, -1, -1, -1, 24, 24, 24, -1, -1,
),
array(
 -1, -1, -1, -1, 28, 28, -1, -1, -1, -1, -1, -1, 28, 28, 85, 59, 59, 48, 28, -1,
 -1, -1, -1, -1, -1, -1, -1, -1, 28, 28, 28, -1, -1,
),
array(
 -1, -1, -1, -1, 9, 9, -1, -1, -1, -1, -1, -1, 9, 9, 84, 86, 86, 45, 9, -1,
 -1, 25, -1, -1, -1, -1, -1, -1, 9, 9, 9, -1, -1,
),
array(
 -1, -1, -1, -1, 24, 24, -1, -1, -1, -1, -1, -1, 24, 24, 83, 87, 87, 46, 24, -1,
 -1, -1, -1, -1, -1, -1, -1, -1, 24, 24, 24, -1, -1,
),
array(
 -1, -1, -1, -1, 27, 27, -1, -1, -1, -1, -1, -1, 27, 27, 72, 81, 81, 47, 27, -1,
 -1, -1, -1, -1, -1, -1, -1, -1, 27, 27, 27, -1, -1,
),
array(
 -1, -1, -1, -1, 28, 28, -1, -1, -1, -1, -1, -1, 28, 28, 85, 88, 88, 48, 28, -1,
 -1, -1, -1, -1, -1, -1, -1, -1, 28, 28, 28, -1, -1,
),
array(
 -1, -1, -1, -1, 9, 9, -1, -1, -1, -1, -1, -1, 9, 9, 84, 89, 89, 45, 9, -1,
 -1, 25, -1, -1, -1, -1, -1, -1, 9, 9, 9, -1, -1,
),
array(
 -1, -1, -1, -1, 24, 24, -1, -1, -1, -1, -1, -1, 24, 24, 83, 90, 90, 46, 24, -1,
 -1, -1, -1, -1, -1, -1, -1, -1, 24, 24, 24, -1, -1,
),
array(
 -1, -1, -1, -1, 27, 27, -1, -1, -1, -1, -1, -1, 27, 27, 72, 91, 91, 47, 27, -1,
 -1, -1, -1, -1, -1, -1, -1, -1, 27, 27, 27, -1, -1,
),
array(
 -1, -1, -1, -1, 28, 28, -1, -1, -1, -1, -1, -1, 28, 28, 85, 92, 92, 48, 28, -1,
 -1, -1, -1, -1, -1, -1, -1, -1, 28, 28, 28, -1, -1,
),
array(
 -1, -1, -1, -1, 27, 27, -1, -1, -1, -1, -1, -1, 27, 27, 72, 95, 95, 47, 27, -1,
 -1, -1, -1, -1, -1, -1, -1, -1, 27, 27, 27, -1, -1,
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
							{ throw new ReadTokenException("Invalid character [{$this->yytext()}] at {$this->yyline}:{$this->yycol}"); }
						case -3:
							break;
						case 3:
							{ return $this->createToken(CSS3Parser::TK_STAR); }
						case -4:
							break;
						case 4:
							{ return $this->createToken(CSS3Parser::TK_S); }
						case -5:
							break;
						case 5:
							{ return createToken(CSS3Parser::TK_TILDE,'~',$this); }
						case -6:
							break;
						case 6:
							{ return createToken(CSS3Parser::TK_MATCH,'=',$this); }
						case -7:
							break;
						case 7:
							{ return $this->createToken(CSS3Parser::TK_PIPE); }
						case -8:
							break;
						case 8:
							{ return createToken(CSS3Parser::TK_MINUS,'-',$this); }
						case -9:
							break;
						case 9:
							{ return $this->createToken(CSS3Parser::TK_IDENT); }
						case -10:
							break;
						case 10:
							{ return $this->createToken(CSS3Parser::TK_NUMBER); }
						case -11:
							break;
						case 11:
							{ return $this->createToken(CSS3Parser::TK_FUNCTION_CLOSE); }
						case -12:
							break;
						case 12:
							{ return createToken(CSS3Parser::TK_PLUS,'+',$this); }
						case -13:
							break;
						case 13:
							{ return createToken(CSS3Parser::TK_GREATER,'>',$this); }
						case -14:
							break;
						case 14:
							{ return createToken(CSS3Parser::TK_COMMA,',',$this); }
						case -15:
							break;
						case 15:
							{ return $this->createToken(CSS3Parser::TK_COLON); }
						case -16:
							break;
						case 16:
							{ return createToken(CSS3Parser::TK_ATTR_OPEN,'[',$this); }
						case -17:
							break;
						case 17:
							{ return createToken(CSS3Parser::TK_ATTR_CLOSE,']',$this); }
						case -18:
							break;
						case 18:
							{ $this->yybegin(self::COMMENT); }
						case -19:
							break;
						case 19:
							{ return createToken(CSS3Parser::TK_SUBSTRINGMATCH,'*=',$this); }
						case -20:
							break;
						case 20:
							{ return createToken(CSS3Parser::TK_INCLUDES,'~=',$this); }
						case -21:
							break;
						case 21:
							{ return createToken(CSS3Parser::TK_DASHMATCH,'|=',$this); }
						case -22:
							break;
						case 22:
							{ return createToken(CSS3Parser::TK_PREFIXMATCH,'^=',$this); }
						case -23:
							break;
						case 23:
							{ return createToken(CSS3Parser::TK_SUFFIXMATCH,'$=',$this); }
						case -24:
							break;
						case 24:
							{
                                              $tok = $this->createToken(CSS3Parser::TK_CLASS);
                                              $tok->value = substr($tok->value,1);
                                              return $tok;
                                            }
						case -25:
							break;
						case 25:
							{ 
                                              $tok = $this->createToken(CSS3Parser::TK_FUNCTION);
                                              $tok->value = substr($tok->value,0,-1);
                                              return $tok;
                                            }
						case -26:
							break;
						case 26:
							{ 
                                              $tok = $this->createToken(CSS3Parser::TK_STRING);
                                              $tok->value = substr($tok->value,1,-1);
                                              return $tok;
                                            }
						case -27:
							break;
						case 27:
							{ 
                              $tok = $this->createToken(CSS3Parser::TK_HASH);
                              $tok->value = substr($tok->value,1);
                              return $tok;
                            }
						case -28:
							break;
						case 28:
							{ return $this->createToken(CSS3Parser::TK_DIMENSION); }
						case -29:
							break;
						case 29:
							{ return $this->createToken(CSS3Parser::TK_NOT); }
						case -30:
							break;
						case 30:
							{ }
						case -31:
							break;
						case 31:
							{ $this->yybegin(self::YYINITIAL); }
						case -32:
							break;
						case 33:
							{ throw new ReadTokenException("Invalid character [{$this->yytext()}] at {$this->yyline}:{$this->yycol}"); }
						case -33:
							break;
						case 34:
							{ return createToken(CSS3Parser::TK_TILDE,'~',$this); }
						case -34:
							break;
						case 35:
							{ return createToken(CSS3Parser::TK_MINUS,'-',$this); }
						case -35:
							break;
						case 36:
							{ return $this->createToken(CSS3Parser::TK_IDENT); }
						case -36:
							break;
						case 37:
							{ return $this->createToken(CSS3Parser::TK_NUMBER); }
						case -37:
							break;
						case 38:
							{
                                              $tok = $this->createToken(CSS3Parser::TK_CLASS);
                                              $tok->value = substr($tok->value,1);
                                              return $tok;
                                            }
						case -38:
							break;
						case 39:
							{ 
                                              $tok = $this->createToken(CSS3Parser::TK_STRING);
                                              $tok->value = substr($tok->value,1,-1);
                                              return $tok;
                                            }
						case -39:
							break;
						case 40:
							{ 
                              $tok = $this->createToken(CSS3Parser::TK_HASH);
                              $tok->value = substr($tok->value,1);
                              return $tok;
                            }
						case -40:
							break;
						case 41:
							{ return $this->createToken(CSS3Parser::TK_DIMENSION); }
						case -41:
							break;
						case 42:
							{ }
						case -42:
							break;
						case 44:
							{ throw new ReadTokenException("Invalid character [{$this->yytext()}] at {$this->yyline}:{$this->yycol}"); }
						case -43:
							break;
						case 45:
							{ return $this->createToken(CSS3Parser::TK_IDENT); }
						case -44:
							break;
						case 46:
							{
                                              $tok = $this->createToken(CSS3Parser::TK_CLASS);
                                              $tok->value = substr($tok->value,1);
                                              return $tok;
                                            }
						case -45:
							break;
						case 47:
							{ 
                              $tok = $this->createToken(CSS3Parser::TK_HASH);
                              $tok->value = substr($tok->value,1);
                              return $tok;
                            }
						case -46:
							break;
						case 48:
							{ return $this->createToken(CSS3Parser::TK_DIMENSION); }
						case -47:
							break;
						case 50:
							{ throw new ReadTokenException("Invalid character [{$this->yytext()}] at {$this->yyline}:{$this->yycol}"); }
						case -48:
							break;
						case 51:
							{ return $this->createToken(CSS3Parser::TK_IDENT); }
						case -49:
							break;
						case 52:
							{
                                              $tok = $this->createToken(CSS3Parser::TK_CLASS);
                                              $tok->value = substr($tok->value,1);
                                              return $tok;
                                            }
						case -50:
							break;
						case 53:
							{ 
                              $tok = $this->createToken(CSS3Parser::TK_HASH);
                              $tok->value = substr($tok->value,1);
                              return $tok;
                            }
						case -51:
							break;
						case 54:
							{ return $this->createToken(CSS3Parser::TK_DIMENSION); }
						case -52:
							break;
						case 56:
							{ throw new ReadTokenException("Invalid character [{$this->yytext()}] at {$this->yyline}:{$this->yycol}"); }
						case -53:
							break;
						case 57:
							{ return $this->createToken(CSS3Parser::TK_IDENT); }
						case -54:
							break;
						case 58:
							{
                                              $tok = $this->createToken(CSS3Parser::TK_CLASS);
                                              $tok->value = substr($tok->value,1);
                                              return $tok;
                                            }
						case -55:
							break;
						case 59:
							{ return $this->createToken(CSS3Parser::TK_DIMENSION); }
						case -56:
							break;
						case 61:
							{ throw new ReadTokenException("Invalid character [{$this->yytext()}] at {$this->yyline}:{$this->yycol}"); }
						case -57:
							break;
						case 63:
							{ throw new ReadTokenException("Invalid character [{$this->yytext()}] at {$this->yyline}:{$this->yycol}"); }
						case -58:
							break;
						case 65:
							{ throw new ReadTokenException("Invalid character [{$this->yytext()}] at {$this->yyline}:{$this->yycol}"); }
						case -59:
							break;
						case 67:
							{ throw new ReadTokenException("Invalid character [{$this->yytext()}] at {$this->yyline}:{$this->yycol}"); }
						case -60:
							break;
						case 79:
							{ return $this->createToken(CSS3Parser::TK_IDENT); }
						case -61:
							break;
						case 80:
							{
                                              $tok = $this->createToken(CSS3Parser::TK_CLASS);
                                              $tok->value = substr($tok->value,1);
                                              return $tok;
                                            }
						case -62:
							break;
						case 81:
							{ 
                              $tok = $this->createToken(CSS3Parser::TK_HASH);
                              $tok->value = substr($tok->value,1);
                              return $tok;
                            }
						case -63:
							break;
						case 82:
							{ return $this->createToken(CSS3Parser::TK_DIMENSION); }
						case -64:
							break;
						case 86:
							{ return $this->createToken(CSS3Parser::TK_IDENT); }
						case -65:
							break;
						case 87:
							{
                                              $tok = $this->createToken(CSS3Parser::TK_CLASS);
                                              $tok->value = substr($tok->value,1);
                                              return $tok;
                                            }
						case -66:
							break;
						case 88:
							{ return $this->createToken(CSS3Parser::TK_DIMENSION); }
						case -67:
							break;
						case 89:
							{ return $this->createToken(CSS3Parser::TK_IDENT); }
						case -68:
							break;
						case 90:
							{
                                              $tok = $this->createToken(CSS3Parser::TK_CLASS);
                                              $tok->value = substr($tok->value,1);
                                              return $tok;
                                            }
						case -69:
							break;
						case 91:
							{ 
                              $tok = $this->createToken(CSS3Parser::TK_HASH);
                              $tok->value = substr($tok->value,1);
                              return $tok;
                            }
						case -70:
							break;
						case 92:
							{ return $this->createToken(CSS3Parser::TK_DIMENSION); }
						case -71:
							break;
						case 93:
							{ return $this->createToken(CSS3Parser::TK_IDENT); }
						case -72:
							break;
						case 94:
							{
                                              $tok = $this->createToken(CSS3Parser::TK_CLASS);
                                              $tok->value = substr($tok->value,1);
                                              return $tok;
                                            }
						case -73:
							break;
						case 95:
							{ 
                              $tok = $this->createToken(CSS3Parser::TK_HASH);
                              $tok->value = substr($tok->value,1);
                              return $tok;
                            }
						case -74:
							break;
						case 96:
							{ return $this->createToken(CSS3Parser::TK_DIMENSION); }
						case -75:
							break;
						case 97:
							{ return $this->createToken(CSS3Parser::TK_IDENT); }
						case -76:
							break;
						case 98:
							{
                                              $tok = $this->createToken(CSS3Parser::TK_CLASS);
                                              $tok->value = substr($tok->value,1);
                                              return $tok;
                                            }
						case -77:
							break;
						case 99:
							{ 
                              $tok = $this->createToken(CSS3Parser::TK_HASH);
                              $tok->value = substr($tok->value,1);
                              return $tok;
                            }
						case -78:
							break;
						case 100:
							{ return $this->createToken(CSS3Parser::TK_DIMENSION); }
						case -79:
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
