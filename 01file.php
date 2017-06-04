<?php
	header("content-type:text/html;charset=utf-8");
	//file文件属性的讲解
	function getFilePro($filename){
		if(!file_exists($filename)){
			echo '目标文件不存在'.'<br/>';
			return;
		}
		//判断是否是一个普通文件 如果是则条件成立
		if(is_file($filename)){
			echo $filename.'是一个文件<br/>';
		}
		//判断是否是一个目录 如果是则条件成立
		if(is_dir($filename)){
			echo $filename.'是一个目录<br/>';
		}
		//用自定义的函数输出文件形态
		echo '文件形态'.getFileType($filename).'<br/>';
		//获取文件大小 并自定义转换单位
		echo '文件大小'.getFileSize(filesize($filename)).'<br/>';

		if(is_readable($filename)){
			echo "文件可读<br/>";
		}
		if(is_writable($filename)){
			echo "文件可写<br/>";
		}
		if(is_executable($filename)){
			echo "文件可执行<br/>";
		}
		echo "文件建立时间:".date('Y年m月j日',filectime($filename))."<br/>";
		echo "文件修改时间:".date('Y年m月j日',filemtime($filename))."<br/>";
		echo "文件访问时间:".date('Y年m月j日',fileatime($filename))."<br/>";
	}
	/** 声明一个函数用来返回文件的类型 */
	function getFileType($filename){
		switch(filetype($filename)){
			case 'file': $type='普通文件'; break;
			case 'dir':  $type='目录文件';break;
			case 'block':$type='块设备文件';break;
			case 'char': $type='字符设备文件';break;
			case 'fifo': $type='命名管道文件';break;
			case 'link': $type='符号链接';break;
			case 'unknown': $type='未知类型';break;
			default :$type.='没有检测到类型';
		}
		return $type;
	}
	//自定义文件大小单位转换函数
	function getFileSize($bytes){
		if($bytes >= pow(2,40)){
			$return=round($bytes/pow(1024,4),2);
			$suffix='TB';
		}
		if($bytes >= pow(2,30)){
			$return=round($bytes/pow(1024,3),2);
			$suffix='GB';
		}
		if($bytes >= pow(2,20)){
			$return=round($bytes/pow(1024,2),2);
			$suffix='MB';
		}
		if($bytes >= pow(2,10)){
			$return=round($bytes/pow(1024,1),2);
			$suffix='KB';
		}else {
			$return=$bytes;
			$suffix='Byte';
		}
		return $return.' '.$suffix;
	}
	//调用自定义函数
	getFilePro('D:/wamp64/www/test/calender');