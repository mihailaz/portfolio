<?php
/**
 * User: Michael Lazarev <mihailaz.90@gmail.com>
 * Date: 17.08.15
 * Time: 15:26
 */

/**
 * Creates a unique filename by appending a number
 *
 * i.e. if image.jpg already exists, returns
 * image2.jpg
 */
function uniqueFilename($path, $name, $ext)
{
	$output = $name;
	$basename = basename($name, '.' . $ext);
	$i = 2;

	while (File::exists($path . '/' . $output)) {
		$output = $basename . $i . '.' . $ext;
		++$i;
	}

	return $output;

}