# < : diff from tested file
# > : diff from control file

FOLDER="..";
DO_EX00=1;
DO_EX01=1;
DO_EX02=0;
DO_EX03=0;
DO_EX04=0;
DO_EX05=0;

if [ "$DO_EX00" != 0 ]; then
	cp -r $FOLDER/ex00/. .;
	cp main/main_00.php ./copy_main_00.php;
	php copy_main_00.php > control-j06;
	diff control-j06  out_main/main_00.out > j06-diff;
	rm -f copy_main_00.php;
	FILE_SIZE=$(du j06-diff | awk '{ print $1 }');
#cat control-j06;
#cat out_main/main_00.out;
	if [ "$FILE_SIZE" = 0 ]; then
		echo "\033[37;01mTesting ex00 j06 : \033[32;01mOK\033[0m";
	else
		echo "\033[37;01mTesting ex00 j06 : \033[31;01mKO\033[0m";
		cat j06-diff;
	fi
fi

if [ "$DO_EX01" != 0 ]; then
	cp -r $FOLDER/ex01/. .;
	cp main/main_01.php ./copy_main_01.php;
	php copy_main_01.php > control-j06;
	diff control-j06  out_main/main_01.out > j06-diff;
	rm -f copy_main_01.php;
	FILE_SIZE=$(du j06-diff | awk '{ print $1 }');
#cat control-j06;
#cat out_main/main_01.out;
	if [ "$FILE_SIZE" = 0 ]; then
		echo "\033[37;01mTesting ex01 j06 : \033[32;01mOK\033[0m";
	else
		echo "\033[37;01mTesting ex01 j06 : \033[31;01mKO\033[0m";
		cat j06-diff;
	fi
fi

if [ "$DO_EX02" != 0 ]; then
	cp -r $FOLDER/ex02/. .;
	cp main/main_02.php ./copy_main_02.php;
	php copy_main_02.php > control-j06;
	diff control-j06  out_main/main_02.out > j06-diff;
	rm -f copy_main_02.php;
	FILE_SIZE=$(du j06-diff | awk '{ print $1 }');
#cat control-j06;
#cat out_main/main_02.out;
	if [ "$FILE_SIZE" = 0 ]; then
		echo "\033[37;01mTesting ex02 j06 : \033[32;01mOK\033[0m";
	else
		echo "\033[37;01mTesting ex02 j06 : \033[31;01mKO\033[0m";
		cat j06-diff;
	fi
fi


if [ "$DO_EX03" != 0 ]; then
	cp -r $FOLDER/ex03/. .;
	cp main/main_03.php ./copy_main_03.php;
	php copy_main_03.php > control-j06;
	diff control-j06  out_main/main_03.out > j06-diff;
	rm -f copy_main_03.php;
	FILE_SIZE=$(du j06-diff | awk '{ print $1 }');
#cat control-j06;
#cat out_main/main_03.out;
	if [ "$FILE_SIZE" = 0 ]; then
		echo "\033[37;01mTesting ex03 j06 : \033[32;01mOK\033[0m";
	else
		echo "\033[37;01mTesting ex03 j06 : \033[31;01mKO\033[0m";
		cat j06-diff;
	fi
fi


if [ "$DO_EX04" != 0 ]; then
	cp -r $FOLDER/ex04/. .;
	cp main/main_04.php ./copy_main_04.php;
	php copy_main_04.php > control-j06;
	diff control-j06  out_main/main_04.out > j06-diff;
	rm -f copy_main_04.php;
	FILE_SIZE=$(du j06-diff | awk '{ print $1 }');
#cat control-j06;
#cat out_main/main_04.out;
	if [ "$FILE_SIZE" = 0 ]; then
		echo "\033[37;01mTesting ex04 j06 : \033[32;01mOK\033[0m";
	else
		echo "\033[37;01mTesting ex04 j06 : \033[31;01mKO\033[0m";
		cat j06-diff;
	fi
fi

if [ "$DO_EX05" != 0 ]; then
	cp -r $FOLDER/ex05/. .;
	cp main/main_05.php ./copy_main_05.php;
	php copy_main_05.php > control-j06;
	diff control-j06  out_main/main_05.out > j06-diff;
	rm -f copy_main_05.php;
	FILE_SIZE=$(du j06-diff | awk '{ print $1 }');
#cat control-j06;
#cat out_main/main_05.out;
	if [ "$FILE_SIZE" = 0 ]; then
		echo "\033[37;01mTesting ex05 j06 : \033[32;01mOK\033[0m";
	else
		echo "\033[37;01mTesting ex05 j06 : \033[31;01mKO\033[0m";
		cat j06-diff;
	fi
fi

rm -f control-j06 j06-diff;