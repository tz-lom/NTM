#!/bin/bash

echo "===	Generate lexer"
java -cp ../../3dparty/JLexPHP/JLexPHP.jar JLexPHP.Main CSS3Lexer
echo
echo "===	Generate parser"
../../3dparty/lemon-php/lemon -LPHP -m CSS3Parser.y
