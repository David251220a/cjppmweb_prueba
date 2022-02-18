<div style="font-family: Arial, Helvetica, sans-serif; font-size:13px; line-height:24px;">
    
    <style>
        .text {
            color: #000000;
            font-weight: bold;
        }
        
        .title {
            background: #e3ffe9;
            border: 1px solid #009c48;
            color: #009c48;
            font-size: 14px;
            font-weight: bold;
            line-height: 16px;
            margin: 10px 0;
            padding: 8px;
            text-align: left;
            text-transform: uppercase;
        }
        .box {
            width: 100%;
            height: 100px;
            margin: 0px;
            padding: 3px;
            border: 1px solid black;
        }
                
    </style>

    <div>

        <table style="margin-bottom: 0px; width: 100%">
            <tr>
                <td>
                                        
                    <img src="<?php echo e(asset('storage/logo.png')); ?>" height="50" />
                    <hr style="margin-bottom: 0px">
                </td>                
            </tr>
        </table>

        <div style="text-align: center; font-size: 10.5px; font-style: italic; margin-top: 0px; margin-bottom: 0px">

            "Administrar transparentemente los fondos jubilatorios y otorgar beneficios sociales a los afiliados, con el personal
            competente y comprometido con un servicio de calidad e innovación constante"

        </div>
        
        <hr style="margin-bottom: 40px">

        <hr style="margin-bottom: 0px">
        <h2 style="text-align: center; margin-top: 5px; margin-bottom: 5px">DECLARACIÓN JURADA DE DOMICILIO</h2>
        <h2 style="text-align: center; margin-top: 5px; margin-bottom: 5px">FORMULARIO DE ACTUALIZACIÓN DE DATOS</h2>
        <hr style="margin-top: 0; margin-bottom: 30px">

        <div style="text-align: justify; margin-top: 0;margin-bottom: 30px;  font-size: 15px">

            En fecha comparece ante mi <span><b><?php echo e($user->affiliate->name); ?></b></span> <span><b><?php echo e($user->affiliate->lastname); ?></b></span>
            <br>
            Con Cédula de Identidad Nº: <span><b><?php echo e(number_format($user->affiliate->document_number, 0, ".", ".")); ?></b></span>, y manifiesta que vive y
            reside en el domicilio: <span><b><?php echo e($user->affiliate->address[0]->address); ?></b></span>
            <br>
            Del barrio: <span><b><?php echo e($user->affiliate->address[0]->neighborhood); ?></b></span> de la ciudad: <span><b><?php echo e($user->affiliate->address[0]->city); ?></b></span>
            

        </div>

        <div style="text-align: justify; margin-top: 0;margin-bottom: 5px;  font-size: 15px">

            Obs: Con quien vive el/la Jubilado/a - Pensionado/a:
            <br>
            <p style="margin-top: 5;margin-bottom: 5px;margin-left: 50px; font-size: 15px">
                Nombre y Apellido:  <b><span><?php echo e($user->affiliate->censo->encargado); ?></span></b>
            </p>            
            <p style="margin-top: 0;margin-bottom: 5px;margin-left: 50px; font-size: 15px">                
                C.I. Nro.:  <b><span><?php echo e(number_format($user->affiliate->censo->documento_encargado, 0, ".", ".")); ?></span></b>
            </p>
            <p style="margin-top: 0;margin-bottom: 5px;margin-left: 50px; font-size: 15px">                
                Nro. de Teléfono:  <b><span><?php echo e($user->affiliate->censo->numero_telefono_encargado); ?></span></b>
            </p>
            <?php
                $parentesco = '';    
            ?>
            <?php if($user->affiliate->censo->parentesco == 1): ?>
                <?php
                    $parentesco = 'HIJO/A'
                ?>
            <?php endif; ?>
            <?php if($user->affiliate->censo->parentesco == 2): ?>
                <?php
                    $parentesco = 'HERMANO/A'
                ?>
            <?php endif; ?>
            <?php if($user->affiliate->censo->parentesco == 3): ?>
                <?php
                    $parentesco = 'NIETO/A'
                ?>
            <?php endif; ?>
            <?php if($user->affiliate->censo->parentesco == 4): ?>
                <?php
                    $parentesco = 'OTRO'
                ?>
            <?php endif; ?>
            <p style="margin-top: 0;margin-bottom: 5px;margin-left: 50px; font-size: 15px">                
                Grado de Parentesco:  <b><span><?php echo e($parentesco); ?></span></b>
            </p>
            Revistiendo ésta manisfestación con caracter de declaración jurada, en fecha: <b><?php echo e(date('d/m/Y', strtotime($user->affiliate->censo->updated_at ))); ?></b>
        </div>

        <div style="text-align: justify; margin-top: 40px;margin-bottom: 0px;  font-size: 15px">

            _____________________________________
            <br>
            Firma del Jubilado/a y/o Pensionado/a
            <br>
            Tel./Cel.: <?php echo e((empty($user->affiliate->celular) ? null : '0'. substr($user->affiliate->celular, 3 ,10))); ?>


        </div>

        <div style="text-align: right; margin-top: 0;margin-bottom: 10px;  font-size: 15px">
            __________________________________
            <br>
            <p style="margin-top: 0px; margin-bottom: 0px;margin-right: 230px"> Ante mí</p>
        </div>

        <hr style="margin-top: 25px;  margin-bottom: 0px">

        <div style="text-align: justify; margin-top: 20px; margin-bottom: 0px;  font-size: 15px">

            Se deja constancia que el/la jubilado/a pensionado/a <span><b><?php echo e($user->affiliate->name); ?></b></span> <span><b><?php echo e($user->affiliate->lastname); ?></b></span>
            presentó en fecha <span><b><?php echo e(date('d/m/Y', strtotime($user->affiliate->censo->updated_at ))); ?></b></span> su Declaración Jurada de domicilio.

        </div>

        <div style="text-align: justify; margin-top: 10px; margin-bottom: 0px;  font-size: 15px" class="box">
            Estimado Jubilado/a y/o Pensionado/a: Recuerde que al percibir sus haberes vía RED BANCARIA debe realizar su <b>CONTROL DE SOBREVIVIENCIA</b>
            en los meses indicados por la CAJA DE JUBILACIONES Y PENSIONES DEL PERSONAL MUNICIPAL, habilitada para el efecto, a fin de evitar retrasos 
            en el cobro de sus haberes. Gracias.
        </div>


    </div>

</div><?php /**PATH C:\laragon\www\cjppm_web\resources\views/documents/censo.blade.php ENDPATH**/ ?>