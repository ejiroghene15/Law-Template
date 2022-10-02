<?php
function sanitizeData($data)
{
	return htmlspecialchars(trim(strip_tags($data)));
}
