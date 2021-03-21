# Bibliteca de Debug para PHP

Ajuda a detectar e corrigir error

Mede tempo de execução de scripts/consultas

Vê o consumo de memória

composer require tracy/tracy


index.php



require 'vendor/autoload.php';

use Tracy\Debugger;

Debugger::enable();

Debugger::$showBar = true;

$os->teste();

Traz uma função dump($var) para ajudar no debug.

Timer

Debugger::timer();

// sweet dreams my cherrie
sleep(2);

$elapsed = Debugger::timer();
// $elapsed = 2

ou
Debugger::timer(); // runs the timer

... // some time-consuming operation

echo Debugger::timer(); // elapsed time in seconds

Obs

Em produção é muito importante desabilitar tracy e toda exibição de erros

Mais detalhes

https://tracy.nette.org/en/guide

