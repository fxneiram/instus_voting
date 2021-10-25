<h3>Resumen</h3>

@foreach($voting->formatedResults() as $option)
    <div class="col-md-12 col-sm-12 col-12">
        <hr>
        <div class="info-box bg-info">
            <span class="info-box-icon"><i class="fas fa-hand-point-up"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">{{$option['description']}}</span>
                <span class="info-box-number">{{$option['total']}}</span>

                <div class="progress">
                    <div class="progress-bar" style="width: {{number_format($option['percentage'],1)}}%"></div>
                </div>
                <span class="progress-description">
                  {{number_format($option['percentage'],1)}} %
                </span>
            </div>
        </div>
    </div>
@endforeach
