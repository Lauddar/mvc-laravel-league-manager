@if($league->start_date > date('Y-m-d H:i:s'))<p>LIGA POR EMPEZAR</p>
@elseif($league->end_date < date('Y-m-d H:i:s'))<p>LIGA FINALIZADA</p>
    @else<p>LIGA EN CURSO</p>
    @endif