@arr=(1,2,3,4,5);
print @arr;
tem=0;
for ($i=0;$i<@arr.length;$i++) {
	if(@arr[$i]>@arr[$i+1])
	{
		tem=@arr[$i];
		@arr[$i]=@arr[i+1];
		@arr[$i+1]=tem;
	}
}

print @arr;


@a1=(1,2,11,21,37,7,6);
@a2=sort@a1;
@a3=sort{$a <=> $b}@s1;
@a4=sort{$b <=> $a}@a1;