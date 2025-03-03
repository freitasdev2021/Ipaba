<?php

class Controller{
    public static function viewSite($view, $vars) {
        include VIEW . 'components/site/header.html';
    
        // Carrega o conteúdo do HTML
        $html = file_get_contents(VIEW . $view);
    
        // Substituir variáveis individuais
        foreach ($vars as $key => $value) {
            if (is_array($value)) {
                // Se for um array simples, transformar em string separada por vírgula
                $value = implode(', ', $value);
            }
    
            // Verifica se a variável existe no HTML antes de substituir
            if (str_contains($html, "{{\$$key}}")) {
                $html = str_replace("{{\$$key}}", $value, $html);
            }
        }
    
        // Detectar e processar loops @foreach($itens as $item)
        $html = preg_replace_callback('/@foreach\(\$(\w+)\s+as\s+\$(\w+)\)(.*?)@endforeach/s', function ($matches) use ($vars) {
            $arrayName = $matches[1]; // Nome do array (ex: 'itens')
            $itemName = $matches[2]; // Nome do item (ex: 'item')
            $content = $matches[3]; // Conteúdo dentro do loop
    
            if (!isset($vars[$arrayName]) || !is_array($vars[$arrayName])) {
                return ''; // Se a variável não for um array, não imprime nada
            }
    
            $output = '';
            foreach ($vars[$arrayName] as $item) {
                $tempContent = $content;
                if (is_array($item)) {
                    foreach ($item as $key => $value) {
                        $tempContent = str_replace("{{\$$itemName->$key}}", $value, $tempContent);
                    }
                } else {
                    $tempContent = str_replace("{{\$$itemName}}", $item, $tempContent);
                }
                $output .= $tempContent;
            }
            return $output;
        }, $html);
    
        echo $html;
    
        include VIEW . 'components/site/footer.html';
    }     
}