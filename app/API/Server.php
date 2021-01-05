<?php
namespace app\API;
use \App\Moedas\Moeda;

class Server{

    


    
    /** 
     * Método responsável por montar a query para ser pesquisado na API
     * @param array moedas
     * @return string query
     */
    private function makeQuery($moedas){
        $query = '';
        foreach ($moedas as $key) {
            if ($key != '' && $key != null) {
                $query .= $key . ',';
            }
        }
            $query = rtrim($query,',');
        return $query;
    }
    
     /**
     * método responsável por gerar a url para busca
     * @param string query
     * @return string url
     */
    public function makeUrl($moedas){
        

        $query = $this->makeQuery($moedas);
        
        $url = 'https://economia.awesomeapi.com.br/all/';
        $url .= $query;

        $this->url = $url;
        return $url;
    }   

      /**
     * Método responsável por realizar o curl para a api com a url gerada
     * @param string url
     * @return string result
     */
    private function request($url){
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');

        curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate');

        $headers = array();
        $headers[] = 'Authority: economia.awesomeapi.com.br';
        $headers[] = 'Cache-Control: max-age=0';
        $headers[] = 'Sec-Ch-Ua: ^^Google';
        $headers[] = 'Sec-Ch-Ua-Mobile: ?0';
        $headers[] = 'Upgrade-Insecure-Requests: 1';
        $headers[] = 'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.9';
        $headers[] = 'Sec-Fetch-Site: none';
        $headers[] = 'Sec-Fetch-Mode: navigate';
        $headers[] = 'Sec-Fetch-User: ?1';
        $headers[] = 'Sec-Fetch-Dest: document';
        $headers[] = 'Accept-Language: pt-BR,pt;q=0.9,en-US;q=0.8,en;q=0.7';
        $headers[] = 'If-None-Match: W/^^1b1-6UXBZyOweiI8GE7Qi3qRR073JgQ^^\"\"';
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        $result = curl_exec($ch);
        if (curl_errno($ch)) {
            echo 'Error:' . curl_error($ch);
        }
        curl_close($ch);

        return $result;
    }

      /**
     * @param string url
     * @return string response
     */
    public function xhr($url){
        $result = $this->request($url);
        $resultDecode = json_decode(($result));
        return $resultDecode;
    }

}
