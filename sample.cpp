#include<stdio.h>
#include<conio.h>
Int m,a,r,c,k,v;
Int main()
{
	clrscr();
	printf("Enter a Number:\n");
	scanf("%d",&m);

	if(m>=1 && m<=10)
	{
		v=m;
		goto boosto:
	}
	r = m/100;
	m = m%1000;
	c = m/100;
	m = m%100;
	if ((m>1) && (m<20))
	{
		k = 0;
		v = 0;
		a = m%10;
	}
	else
	{
		k=m/10
		m = m%10;
		v = m
	}
	switch(r)
	{
		case 1:printf("One thousand"); break;
		case 2:printf("Two thousand"); break;
		case 3:printf("Three thousand"); break;
	}
	switch(c)
	{
		case 1:printf("One hundred"); break;
		case 2:printf("Two hundred"); break;
		case 3:printf("Three hundred"); break;
		case 4:printf("Four hundred"); break;
		case 5:printf("Five hundred"); break;
		case 6:printf("Six hundred"); break;
		case 7:printf("Seven hundred"); break;
		case 8:printf("Eight hundred"); break;
		case 9:printf("Nine hundred"); break;
	}
	switch(a)
	{
		case 1:printf("Eleven"); break;
		case 2:printf("Twelve"); break;
		case 3:printf("Thirteen"); break;
		case 4:printf("Fourteen"); break;
		case 5:printf("Fifteen"); break;
		case 6:printf("Sixteen"); break;
		case 7:printf("Seventeen"); break;
		case 8:printf("Eightteen"); break;
		case 9:printf("Nineteen"); break;
	}
	switch(k)
	{
		
		case 2:printf("Twenty"); break;
		case 3:printf("Thirty"); break;
		case 4:printf("Fourty"); break;
		case 5:printf("Fifty"); break;
		case 6:printf("Sixty"); break;
		case 7:printf("Seventy"); break;
		case 8:printf("Eighty"); break;
		case 9:printf("Ninety"); break;
	}
	Boosto:
	switch(v)
	{
		case 1:printf("One"); break;
		case 2:printf("Two"); break;
		case 3:printf("Three"); break;
		case 4:printf("Four"); break;
		case 5:printf("Five"); break;
		case 6:printf("Six"); break;
		case 7:printf("Seven"); break;
		case 8:printf("Eight"); break;
		case 9:printf("Nine"); break;
		case 9:printf("Ten"); break;
	}
	getch();
	return 0;
}