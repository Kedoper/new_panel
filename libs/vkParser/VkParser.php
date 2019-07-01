<?php


namespace VParser;
const VERSION = "0.1";

class VkParser
{

    public function getVersion()
    {
        return VERSION;
    }

    /**
     * В качестве входного параметра имеет строку адреса страницы пользователся ВКонтакте, любого вида,
     * например https://vk.com/tester1123 вернет tester1123.
     *
     * @param string $uri
     * @return string
     */
    public function getDomain(string $uri)
    {
        $pos = strpos($uri, 'vk.com');
        if (empty($pos) && $pos !== 0) {
            $pos = 0;
            if ($uri[0] == "@") $pos += 1;
            $response = substr($uri, $pos);
        } else {
            $pos_2 = $pos + 7;
            $response = substr($uri, $pos_2);
        }
        if ($response === false || $response === 0 || empty($response)) $response = "Wrong uri";
        return $response;
    }
}