
function OnChangeTableOrder(obj)
{
	var thishref = location.href;   
	//将跳转的页面赋值给 url
	
	if ( -1 == thishref.indexOf('.php') )//和一个不存在的字符串做比较，返回的是-1 跳转路径不是php文件
	{
		var arr = thishref.split('-');//将其切割成数组
		if ( arr.length == 6 )
			location = arr[0]+'-'+arr[1]+'-'+arr[2]+'-'+arr[3]+'-'+obj.value+'-'+arr[5];
		else if ( arr.length == 5 )
			location = arr[0]+'-'+arr[1]+'-'+arr[2]+'-'+obj.value+'-'+arr[4];
		else if ( arr.length == 4 )
			location = thishref.replace('.html', '-'+obj.value+'-1.html' );
		else if ( arr.length == 3 )
			location = thishref.replace('.html', '-'+obj.value+'-1.html' );
		else
			location = thishref.replace('.html', '-0-0-'+obj.value+'-1.html' );
	}
	else
	{
		var vfind = 'taborder=';
		var idx = thishref.indexOf(vfind);
		if ( -1 == idx )
		{
			if ( -1 == thishref.indexOf('?') )
				thishref += '?';

			location = thishref + '&' + vfind + obj.value;
		}
		else
		{
			idx += vfind.length;
			var endx = thishref.indexOf('&', idx);
			if ( -1 == endx)
				endx = thishref.length;

			var vreplace = vfind + thishref.substr(idx, endx-idx);
			location = thishref.replace(vreplace, vfind+obj.value);
		}
	}
}
