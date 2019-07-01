<?php


include "VkParser.php";

$vParser = new \VParser\VkParser();

print_r($vParser->getDomain("vk.com/domain1231")); echo "\n";
print_r($vParser->getDomain("https://vk.com/domain1231")); echo "\n";
print_r($vParser->getDomain("domain1231")); echo "\n";
print_r($vParser->getDomain("https://www.vk.com/domain1231")); echo "\n";
print_r($vParser->getDomain("www.vk.com/domain1231")); echo "\n";
print_r($vParser->getDomain("www.vk.com/domain1231")); echo "\n";