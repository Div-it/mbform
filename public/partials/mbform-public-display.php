<form action="<?php echo $action; ?>"  method="GET" id="mbmainform" >
<div class="mbmainform <?php echo $class;?>" <?php echo $style;?>  >
<div class="container">
    <div class="row">
        <div class="col-lg-1"></div>
        <div class="col-lg-2 col-md-3 col-sm-12 col-xs-12 hidden-xs hidden-sm ">
            <div class="form-group">
                <label for="hoteldestino" class="sr-only"><?php echo __('Arrival Date','mbform');?></label>
                <input type="hidden" id="hoteldestino" name="hoteldestino" value="<?php echo $hotelDestino; ?>" class="form-control"/>
                <div style="color: #fff; font-size: 1.5em; margin-top: 10px;" class="text-center"><?php echo $i18n['form.titulo'];?></div>
            </div>
        </div>
        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-4">
            <div class="form-group">
                <input type="hidden" id="hoteldestino" name="hoteldestino" value="<?php echo $hotelDestino; ?>" />
                <label for="" class="sr-only"><?php echo $i18n['form.arrival.label'] ;?></label>
                <input type="text" class="datepicker txt-mini" id="fechain" name="fechain" class="form-control"  placeholder="<?php echo $i18n['form.arrival.placeholder'] ;?>"  />
                <div class="contIco"><i class="fa fa-calendar" aria-hidden="true"></i></div>
            </div>
        </div>
        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-4">
            <div class="form-group">
                <label class="sr-only"><?php echo  $i18n['form.departure.label'];?></label>
                <input type="text" class="datepicker txt-mini"  id="fechaout" name="fechaout"  placeholder="<?php echo  $i18n['form.departure.placeholder'];?>"  />
                <div class="contIco"><i class="fa fa-calendar" aria-hidden="true"></i></div>
            </div>
        </div>
        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-4">
            <div class="form-group">
                <label class="sr-only"><?php echo  $i18n['form.prcode.label'];?></label>
                <input type="text" class="txt-mini"  id="prcode" name="prcode" length="20" placeholder="<?php echo  $i18n['form.prcode.placeholder'];?>" />
            </div>
        </div>
        <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12 text-center">
            <div class="form-group">
                <button class="btn btn-info btnResMotor hidden-xs hidden-sm <?php echo $class;?>" type="submit" /><?php echo  $i18n['form.submit.desktop']; ?></button>
                <button class="btn btn-info btnResMotor hidden-lg hidden-md <?php echo $class;?>" type="submit" /><?php echo  $i18n['form.submit.mobile']; ?></button>
            </div>
        </div>
        <div class="col-lg-1"></div>
    </div>
</div>
</div>
</form>