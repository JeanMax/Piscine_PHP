# < : diff from tested file
# > : diff from control file

FOLDER="..";

VERBOSE=0;

DO_EX00=1;
DO_EX01=1;
DO_EX02=1;
DO_EX03=1;
DO_EX04=1;
DO_EX05=0;

if [ "$DO_EX00" != 0 ]; then
	cp -r $FOLDER/ex00/. .;
	cp main/main_00.php ./copy_main_00.php;
	php copy_main_00.php > test-j06;
	diff test-j06 out_main/main_00.out > diff-j06;
	rm -f copy_main_00.php;
	FILE_SIZE=$(du diff-j06 | awk '{ print $1 }');
	if [ "$FILE_SIZE" = 0 ]; then
		echo "\033[37;01mTesting ex00 j06 : \033[32;01mOK\033[0m";
	else
		echo "\033[37;01mTesting ex00 j06 : \033[31;01mKO\033[0m";
		echo "\033[37;01mdiff:\033[0m"; cat diff-j06;
		if [ "$VERBOSE" != 0 ]; then
			echo "\033[37;01m\ntest:\033[0m"; cat test-j06;
			echo "\033[37;01m\ncontrol:\033[0m"; cat out_main/main_00.out;
		fi
	fi
fi

if [ "$DO_EX01" != 0 ]; then
	cp -r $FOLDER/ex01/. .;
	cp main/main_01.php ./copy_main_01.php;
	php copy_main_01.php > test-j06;
	diff test-j06 out_main/main_01.out > diff-j06;
	rm -f copy_main_01.php;
	FILE_SIZE=$(du diff-j06 | awk '{ print $1 }');
	if [ "$FILE_SIZE" = 0 ]; then
		echo "\033[37;01mTesting ex01 j06 : \033[32;01mOK\033[0m";
	else
		echo "\033[37;01mTesting ex01 j06 : \033[31;01mKO\033[0m";
		echo "\033[37;01mdiff:\033[0m"; cat diff-j06;
		if [ "$VERBOSE" != 0 ]; then
			echo "\033[37;01m\ntest:\033[0m"; cat test-j06;
			echo "\033[37;01m\ncontrol:\033[0m"; cat out_main/main_01.out;
		fi
	fi
fi

if [ "$DO_EX02" != 0 ]; then
	cp -r $FOLDER/ex02/. .;
	cp main/main_02.php ./copy_main_02.php;
	php copy_main_02.php > test-j06;
	diff test-j06 out_main/main_02.out > diff-j06;
	rm -f copy_main_02.php;
	FILE_SIZE=$(du diff-j06 | awk '{ print $1 }');
	if [ "$FILE_SIZE" = 0 ]; then
		echo "\033[37;01mTesting ex02 j06 : \033[32;01mOK\033[0m";
	else
		echo "\033[37;01mTesting ex02 j06 : \033[31;01mKO\033[0m";
		echo "\033[37;01mdiff:\033[0m"; cat diff-j06;
		if [ "$VERBOSE" != 0 ]; then
			echo "\033[37;01m\ntest:\033[0m"; cat test-j06;
			echo "\033[37;01m\ncontrol:\033[0m"; cat out_main/main_02.out;
		fi
	fi
fi

if [ "$DO_EX03" != 0 ]; then
	cp -r $FOLDER/ex03/. .;
	cp main/main_03.php ./copy_main_03.php;
	php copy_main_03.php > test-j06;
	diff test-j06 out_main/main_03.out > diff-j06;
	rm -f copy_main_03.php;
	FILE_SIZE=$(du diff-j06 | awk '{ print $1 }');
	if [ "$FILE_SIZE" = 0 ]; then
		echo "\033[37;01mTesting ex03 j06 : \033[32;01mOK\033[0m";
	else
		echo "\033[37;01mTesting ex03 j06 : \033[31;01mKO\033[0m";
		echo "\033[37;01mdiff:\033[0m"; cat diff-j06;
		if [ "$VERBOSE" != 0 ]; then
			echo "\033[37;01m\ntest:\033[0m"; cat test-j06;
			echo "\033[37;01m\ncontrol:\033[0m"; cat out_main/main_03.out;
		fi
	fi
fi

if [ "$DO_EX04" != 0 ]; then
	cp -r $FOLDER/ex04/. .;
	cp main/main_04.php ./copy_main_04.php;
	php copy_main_04.php > test-j06;
	diff test-j06 out_main/main_04.out > diff-j06;
	rm -f copy_main_04.php;
	FILE_SIZE=$(du diff-j06 | awk '{ print $1 }');
	if [ "$FILE_SIZE" = 0 ]; then
		echo "\033[37;01mTesting ex04 j06 : \033[32;01mOK\033[0m";
	else
		echo "\033[37;01mTesting ex04 j06 : \033[31;01mKO\033[0m";
		echo "\033[37;01mdiff:\033[0m"; cat diff-j06;
		if [ "$VERBOSE" != 0 ]; then
			echo "\033[37;01m\ntest:\033[0m"; cat test-j06;
			echo "\033[37;01m\ncontrol:\033[0m"; cat out_main/main_04.out;
		fi
	fi
fi

if [ "$DO_EX05" != 0 ]; then
	cp -r $FOLDER/ex05/. .;
	cp main/main_05.php ./copy_main_05.php;
	php copy_main_05.php > test-j06;
	diff test-j06 out_main/main_05.out > diff-j06;
	rm -f copy_main_05.php;
	FILE_SIZE=$(du diff-j06 | awk '{ print $1 }');
	if [ "$FILE_SIZE" = 0 ]; then
		echo "\033[37;01mTesting ex05 j06 : \033[32;01mOK\033[0m";
	else
		echo "\033[37;01mTesting ex05 j06 : \033[31;01mKO\033[0m";
		echo "\033[37;01mdiff:\033[0m"; cat diff-j06;
		if [ "$VERBOSE" != 0 ]; then
			echo "\033[37;01m\ntest:\033[0m"; cat test-j06;
			echo "\033[37;01m\ncontrol:\033[0m"; cat out_main/main_05.out;
		fi
	fi
fi

rm -f test-j06 diff-j06;