<div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
    <div class="container">
        <h3 class="font-weight-bold text-title">Hola {{ Session::get('inchalam.user') }} {{ Session::get('inchalam.lastname') }}</h3>
        <div class="row justify-content-center">
            <div class="col-md-10">
                <h5 class="font-weight-light pt-4 text-center">Tu categoría es <strong class="color-primary">Especialista</strong> y tienes <strong class="color-primary">{{ $datosPerfil['puntos'] }}</strong> Puntos</h5>
                <p class="font-weight-light text-center pb-3">4.000 puntos se vencerán el 14 de nov 2019</p>
                <hr>
                <p class="mb-0">¡Llevas el 75% de tus objetivos completado!</p>
                <div class="progressmax">
                    <div class="progres-color">
                        <div class="progress animated slideInLeft slows" data-wow-delay="1s" style="height: 4px;">
                            <div class="progress-bar" role="progressbar" style="width: 15%" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>
                            <div class="progress-bar bg-success" role="progressbar" style="width: 30%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
                            <div class="progress-bar bg-info" role="progressbar" style="width: 20%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                <div class="pointProgressBar2 animated pulse infinite slows"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <h6 class="text-title">Tus datos</h6>
                <div class="row">
                    <div class="col-md-4">
                        <p>Rut: {{ $datosPerfil['rut'] }}</p>
                    </div>
                    <div class="col-md-4">
                        <p>E-mail: {{ $datosPerfil['email'] }}</p>
                    </div>
                    <div class="col-md-4">
                        <p>Teléfono: {{ $datosPerfil['fono'] }}</p>
                    </div>
                </div>
                <div class="row justify-content-end pt-4">
                    <div class="col-4">
                        <button class="btn btn-primary btn-block waves-effect waves-light" data-toggle="modal" data-target="#editperfil">Editar perfil</button>
                    </div>
                </div>
                <div class="row justify-content-end pt-4">
                    <div class="col-md-12">
                        <table class="table text-center">
                            <thead class="bg-secondary white-text">
                                <tr>
                                    <th scope="col">Fecha registrada</th>
                                    <th scope="col">Descripción</th>
                                    <th scope="col">Abonos</th>
                                    <th scope="col">Cargos</th>
                                    <th scope="col">Pdf</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                                @foreach( $datosPerfil['rewards'] as $reward)
                                <tr>
                                <?php
                                    
                                    $fecha_reward = new DateTime( $reward->date_added );
                                    $cadena_fecha_reward = $fecha_reward->format("d/m/Y");
                                ?>
                  
                                <th scope="row"> {{ $cadena_fecha_reward }}</th>
                                    <td>{{ $reward->description }}</td>
                                    <td>{{ ($reward->points > 0) ? $reward->points : '' }}</td>
                                    <td>{{ ($reward->points < 0) ? $reward->points : '' }}</td>
                                    <td><i class="fas fa-file-pdf"></i></td>
                                </tr>
                                @endforeach
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>