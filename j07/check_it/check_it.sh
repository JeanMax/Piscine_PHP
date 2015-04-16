# < : diff from tested file
# > : diff from control file

FOLDER="..";

VERBOSE=0;

DO_EX00=1;
DO_EX01=1;
DO_EX02=1;
DO_EX03=1;
DO_EX04=1;
DO_EX05=1;
DO_EX06=1;

if [ "$DO_EX00" != 0 ]; then
	cp -r $FOLDER/ex00/. .;
	cp ex00/test.php ./copy_main_00.php;
	php copy_main_00.php > test-j07;
	diff test-j07 ex00/test.out > diff-j07;
	rm -f copy_main_00.php;
	FILE_SIZE=$(du diff-j07 | awk '{ print $1 }');
	if [ "$FILE_SIZE" = 0 ]; then
		echo "\033[37;01mTesting ex00 j07 : \033[32;01mOK\033[0m";
	else
		echo "\033[37;01mTesting ex00 j07 : \033[31;01mKO\033[0m";
		echo "\033[37;01mdiff:\033[0m";
		cat diff-j07;
		if [ "$VERBOSE" != 0 ]; then
			echo "\033[37;01m\ntest:\033[0m";
			cat test-j07;
			echo "\033[37;01m\ncontrol:\033[0m";
			cat ex00/test.out;
		fi
	fi
fi

if [ "$DO_EX01" != 0 ]; then
	cp -r $FOLDER/ex01/. .;
	cp ex01/Euron.class.php .;
	cp ex01/test1.php ./copy_main_01.php;
	php copy_main_01.php > test-j07;
	diff test-j07 ex01/test1.out > diff-j07;
	FILE_SIZE=$(du diff-j07 | awk '{ print $1 }');
	if [ "$FILE_SIZE" = 0 ]; then
		echo "\033[37;01mTesting ex01a j07 : \033[32;01mOK\033[0m";
	else
		echo "\033[37;01mTesting ex01a j07 : \033[31;01mKO\033[0m";
		echo "\033[37;01mdiff:\033[0m";
		cat diff-j07;
		if [ "$VERBOSE" != 0 ]; then
			echo "\033[37;01m\ntest:\033[0m";
			cat test-j07;
			echo "\033[37;01m\ncontrol:\033[0m";
			cat ex01/test1.out;
		fi
	fi
	cp ex01/test2.php ./copy_main_01.php;
	php copy_main_01.php 2> test-j07;
	diff test-j07 ex01/test2.out > diff-j07;
	rm -f copy_main_01.php;
	FILE_SIZE=$(du diff-j07 | awk '{ print $1 }');
	if [ "$FILE_SIZE" = 0 ]; then
		echo "\033[37;01mTesting ex01b j07 : \033[32;01mOK\033[0m";
	else
		echo "\033[37;01mTesting ex01b j07 : \033[31;01mKO\033[0m";
		echo "\033[37;01mdiff:\033[0m";
		cat diff-j07;
		if [ "$VERBOSE" != 0 ]; then
			echo "\033[37;01m\ntest:\033[0m";
			cat test-j07;
			echo "\033[37;01m\ncontrol:\033[0m";
			cat ex01/test2.out;
		fi
	fi
fi

if [ "$DO_EX02" != 0 ]; then
	cp -r $FOLDER/ex02/. .;
	cp ex02/test.php ./copy_main_02.php;
	php copy_main_02.php > test-j07;
	diff test-j07 ex02/test.out > diff-j07;
	rm -f copy_main_02.php;
	FILE_SIZE=$(du diff-j07 | awk '{ print $1 }');
	if [ "$FILE_SIZE" = 0 ]; then
		echo "\033[37;01mTesting ex02 j07 : \033[32;01mOK\033[0m";
	else
		echo "\033[37;01mTesting ex02 j07 : \033[31;01mKO\033[0m";
		echo "\033[37;01mdiff:\033[0m";
		cat diff-j07;
		if [ "$VERBOSE" != 0 ]; then
			echo "\033[37;01m\ntest:\033[0m";
			cat test-j07;
			echo "\033[37;01m\ncontrol:\033[0m";
			cat ex02/test.out;
		fi
	fi
fi

if [ "$DO_EX03" != 0 ]; then
	cp -r $FOLDER/ex03/. .;
	cp ex03/test1.php ./copy_main_03.php;
	php copy_main_03.php > test-j07;
	diff test-j07 ex03/test1.out > diff-j07;
	FILE_SIZE=$(du diff-j07 | awk '{ print $1 }');
	if [ "$FILE_SIZE" = 0 ]; then
		echo "\033[37;01mTesting ex03a j07 : \033[32;01mOK\033[0m";
	else
		echo "\033[37;01mTesting ex03a j07 : \033[31;01mKO\033[0m";
		echo "\033[37;01mdiff:\033[0m";
		cat diff-j07;
		if [ "$VERBOSE" != 0 ]; then
			echo "\033[37;01m\ntest:\033[0m";
			cat test-j07;
			echo "\033[37;01m\ncontrol:\033[0m";
			cat ex03/test1.out;
		fi
	fi
	cp ex03/test2.php ./copy_main_03.php;
	php copy_main_03.php 2> test-j07;
	diff test-j07 ex03/test2.out > diff-j07;
	rm -f copy_main_03.php;
	FILE_SIZE=$(du diff-j07 | awk '{ print $1 }');
	if [ "$FILE_SIZE" = 0 ]; then
		echo "\033[37;01mTesting ex03b j07 : \033[32;01mOK\033[0m";
	else
		echo "\033[37;01mTesting ex03b j07 : \033[31;01mKO\033[0m";
		echo "\033[37;01mdiff:\033[0m";
		cat diff-j07;
		if [ "$VERBOSE" != 0 ]; then
			echo "\033[37;01m\ntest:\033[0m";
			cat test-j07;
			echo "\033[37;01m\ncontrol:\033[0m";
			cat ex03/test2.out;
		fi
	fi
fi

if [ "$DO_EX04" != 0 ]; then
	cp -r $FOLDER/ex04/. .;
	cp ex04/test.php ./copy_main_04.php;
	php copy_main_04.php > test-j07;
	diff test-j07 ex04/test.out > diff-j07;
	rm -f copy_main_04.php;
	FILE_SIZE=$(du diff-j07 | awk '{ print $1 }');
	if [ "$FILE_SIZE" = 0 ]; then
		echo "\033[37;01mTesting ex04 j07 : \033[32;01mOK\033[0m";
	else
		echo "\033[37;01mTesting ex04 j07 : \033[31;01mKO\033[0m";
		echo "\033[37;01mdiff:\033[0m";
		cat diff-j07;
		if [ "$VERBOSE" != 0 ]; then
			echo "\033[37;01m\ntest:\033[0m";
			cat test-j07;
			echo "\033[37;01m\ncontrol:\033[0m";
			cat ex04/test.out;
		fi
	fi
fi

if [ "$DO_EX05" != 0 ]; then
	cp -r $FOLDER/ex05/. .;
	cp ex05/test1.php ./copy_main_05.php;
	php copy_main_05.php > test-j07;
	diff test-j07 ex05/test1.out > diff-j07;
	FILE_SIZE=$(du diff-j07 | awk '{ print $1 }');
	if [ "$FILE_SIZE" = 0 ]; then
		echo "\033[37;01mTesting ex05a j07 : \033[32;01mOK\033[0m";
	else
		echo "\033[37;01mTesting ex05a j07 : \033[31;01mKO\033[0m";
		echo "\033[37;01mdiff:\033[0m";
		cat diff-j07;
		if [ "$VERBOSE" != 0 ]; then
			echo "\033[37;01m\ntest:\033[0m";
			cat test-j07;
			echo "\033[37;01m\ncontrol:\033[0m";
			cat ex05/test1.out;
		fi
	fi
	cp ex05/test2.php ./copy_main_05.php;
	php copy_main_05.php 2> test-j07;
	diff test-j07 ex05/test2.out > diff-j07;
	rm -f copy_main_05.php;
	FILE_SIZE=$(du diff-j07 | awk '{ print $1 }');
	if [ "$FILE_SIZE" = 0 ]; then
		echo "\033[37;01mTesting ex05b j07 : \033[32;01mOK\033[0m";
	else
		echo "\033[37;01mTesting ex05b j07 : \033[31;01mKO\033[0m";
		echo "\033[37;01mdiff:\033[0m";
		cat diff-j07;
		if [ "$VERBOSE" != 0 ]; then
			echo "\033[37;01m\ntest:\033[0m";
			cat test-j07;
			echo "\033[37;01m\ncontrol:\033[0m";
			cat ex05/test2.out;
		fi
	fi
fi

if [ "$DO_EX06" != 0 ]; then
	cp -r $FOLDER/ex06/. .;
	cp ex06/test1.php ./copy_main_06.php;
	php copy_main_06.php > test-j07;
	diff test-j07 ex06/test1.out > diff-j07;
	FILE_SIZE=$(du diff-j07 | awk '{ print $1 }');
	if [ "$FILE_SIZE" = 0 ]; then
		echo "\033[37;01mTesting ex06a j07 : \033[32;01mOK\033[0m";
	else
		echo "\033[37;01mTesting ex06a j07 : \033[31;01mKO\033[0m";
		echo "\033[37;01mdiff:\033[0m";
		cat diff-j07;
		if [ "$VERBOSE" != 0 ]; then
			echo "\033[37;01m\ntest:\033[0m";
			cat test-j07;
			echo "\033[37;01m\ncontrol:\033[0m";
			cat ex06/test1.out;
		fi
	fi
	cp ex06/test2.php ./copy_main_06.php;
	php copy_main_06.php 2> test-j07;
	diff test-j07 ex06/test2.out > diff-j07;
	rm -f copy_main_06.php;
	FILE_SIZE=$(du diff-j07 | awk '{ print $1 }');
	if [ "$FILE_SIZE" = 0 ]; then
		echo "\033[37;01mTesting ex06b j07 : \033[32;01mOK\033[0m";
	else
		echo "\033[37;01mTesting ex06b j07 : \033[31;01mKO\033[0m";
		echo "\033[37;01mdiff:\033[0m";
		cat diff-j07;
		if [ "$VERBOSE" != 0 ]; then
			echo "\033[37;01m\ntest:\033[0m";
			cat test-j07;
			echo "\033[37;01m\ncontrol:\033[0m";
			cat ex06/test2.out;
		fi
	fi
fi

rm -f test-j07 diff-j07;