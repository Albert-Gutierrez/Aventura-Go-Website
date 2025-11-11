<?php
include_once __DIR__ . '/../../layouts/header_administrador.php';
?>

<body>
    <!-- Layout Principal con Panel y Contenido -->
    <section id="admin-dashboard">

        <!-- Panel Lateral -->
        <?php
        include_once __DIR__ . '/../../layouts/panel_izq_administrador.php';
        ?>

        <!-- Contenido Principal -->
        <div class="info">

            <!-- Barra de Búsqueda Superior -->
            <?php
            include_once __DIR__ . '/../../layouts/buscador_administrador.php';
            ?>

            <!-- Formulario Wizard -->
            <form id="formProveedor" action="/aventura_go/app/controllers/registrarProveedor.php" method="POST">


                <div class="wizard-container">
                    <div class="wizard-header">
                        <p class="mb-0">Registro de Proveedor de Turismo</p>
                    </div>

                    <div class="wizard-steps">
                        <div class="step active" data-step="1">
                            <div class="step-circle">1</div>
                            <div class="step-label">Información Básica</div>
                        </div>
                        <div class="step" data-step="2">
                            <div class="step-circle">2</div>
                            <div class="step-label">Servicios</div>
                        </div>
                        <div class="step" data-step="3">
                            <div class="step-circle">3</div>
                            <div class="step-label">Ubicación</div>
                        </div>
                        <div class="step" data-step="4">
                            <div class="step-circle">4</div>
                            <div class="step-label">Confirmación</div>
                        </div>
                    </div>

                    <div class="wizard-content">
                        <!-- Paso 1 -->
                        <div class="step-content active" data-step="1">
                            <h4 class="mb-4"><i class="fas fa-building text-primary"></i> Información Básica del Proveedor</h4>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Nombre de la Empresa *</label>
                                    <input type="text" name="nombre_empresa" class="form-control" id="empresa" placeholder="Ej: Aventuras Extremas SAS" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">NIT/RUT *</label>
                                    <input type="text" name="nit_rut" class="form-control" id="nit" placeholder="123456789-0" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Nombres y apellidos del Representante *</label>
                                    <input type="text" name="nombre_representante" class="form-control" id="representante" placeholder="Juan Pérez" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Email *</label>
                                    <input type="email" name="email" class="form-control" id="email" placeholder="contacto@empresa.com" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Teléfono *</label>
                                    <input type="tel" name="telefono" class="form-control" id="telefono" placeholder="+57 300 123 4567" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Años de Experiencia *</label>
                                    <input type="number" name="anos_experiencia" class="form-control" id="experiencia" placeholder="5" required>
                                </div>
                            </div>
                        </div>

                        <!-- Paso 2 -->
                        <div class="step-content" data-step="2">
                            <h4 class="mb-4"><i class="fas fa-hiking text-primary"></i> Servicios Ofrecidos</h4>
                            <div class="row">
                                <div class="col-md-12 mb-4">
                                    <label class="form-label">Tipo de Actividades</label>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-check mb-2">
                                                <input class="form-check-input" type="checkbox" name="actividades[]" id="rafting" value="Rafting">
                                                <label class="form-check-label">🚣 Rafting</label>
                                            </div>
                                            <div class="form-check mb-2">
                                                <input class="form-check-input" type="checkbox" name="actividades[]" id="parapente" value="Parapente">
                                                <label class="form-check-label">🪂 Parapente</label>
                                            </div>
                                            <div class="form-check mb-2">
                                                <input class="form-check-input" type="checkbox" name="actividades[]" id="senderismo" value="Senderismo">
                                                <label class="form-check-label">🥾 Senderismo</label>
                                            </div>
                                            <div class="form-check mb-2">
                                                <input class="form-check-input" type="checkbox" name="actividades[]" id="escalada" value="Escalada">
                                                <label class="form-check-label">🧗 Escalada</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-check mb-2">
                                                <input class="form-check-input" type="checkbox" name="actividades[]" id="buceo" value="Buceo">
                                                <label class="form-check-label">🤿 Buceo</label>
                                            </div>
                                            <div class="form-check mb-2">
                                                <input class="form-check-input" type="checkbox" name="actividades[]" id="camping" value="Camping">
                                                <label class="form-check-label">🏕 Camping</label>
                                            </div>
                                            <div class="form-check mb-2">
                                                <input class="form-check-input" type="checkbox" name="actividades[]" id="ciclismo" value="Ciclismo de Montaña">
                                                <label class="form-check-label">🚵 Ciclismo de Montaña</label>
                                            </div>
                                            <div class="form-check mb-2">
                                                <input class="form-check-input" type="checkbox" name="actividades[]" id="canopy" value="Canopy">
                                                <label class="form-check-label">🌲 Canopy</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label class="form-label">Capacidad Máxima *</label>
                                    <input type="number" name="capacidad" class="form-control" id="capacidad" placeholder="20" required>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label class="form-label">Descripción *</label>
                                    <textarea class="form-control" id="descripcion" name="descripcion" rows="4" placeholder="Describe los servicios que ofreces..." required></textarea>
                                </div>
                            </div>
                        </div>

                        <!-- Paso 3 -->
                        <div class="step-content" data-step="3">
                            <h4 class="mb-4"><i class="fas fa-map-marker-alt text-primary"></i> Ubicación y Cobertura</h4>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Departamento *</label>
                                    <select class="form-select" id="departamento" name="departamento" required>
                                        <option selected>Selecciona...</option>
                                        <option>Amazonas</option>
                                        <option>Antioquia</option>
                                        <option>Arauca</option>
                                        <option>Atlántico</option>
                                        <option>Bolívar</option>
                                        <option>Boyacá</option>
                                        <option>Caldas</option>
                                        <option>Caquetá</option>
                                        <option>Casanare</option>
                                        <option>Cauca</option>
                                        <option>Cesar</option>
                                        <option>Chocó</option>
                                        <option>Córdoba</option>
                                        <option>Cundinamarca</option>
                                        <option>Guainía</option>
                                        <option>Guaviare</option>
                                        <option>Huila</option>
                                        <option>La Guajira</option>
                                        <option>Magdalena</option>
                                        <option>Meta</option>
                                        <option>Nariño</option>
                                        <option>Norte de Santander</option>
                                        <option>Putumayo</option>
                                        <option>Quindío</option>
                                        <option>Risaralda</option>
                                        <option>San Andrés y Providencia</option>
                                        <option>Santander</option>
                                        <option>Sucre</option>
                                        <option>Tolima</option>
                                        <option>Valle del Cauca</option>
                                        <option>Vaupés</option>
                                        <option>Vichada</option>
                                    </select>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Ciudad *</label>
                                    <input type="text" name="ciudad" class="form-control" id="ciudad" placeholder="Ej: Medellín" required>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label class="form-label">Dirección *</label>
                                    <input type="text" name="direccion" class="form-control" id="direccion" placeholder="Calle 123 #45-67" required>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label class="form-label">Cobertura *</label>
                                    <textarea class="form-control" id="cobertura" name="cobertura" rows="3" placeholder="Describe las zonas donde ofreces tus servicios..." required></textarea>
                                </div>

                            </div>
                        </div>

                        <!-- Paso 4 -->
                        <div class="step-content" data-step="4">
                            <div class="text-center">
                                <i class="fas fa-check-circle success-icon"></i>
                                <h4>Confirma tu Registro</h4>
                            </div>
                            <div class="preview-card">
                                <h6 class="text-primary mb-3"><i class="fas fa-building"></i> Información Básica</h6>
                                <div class="row">
                                    <div class="col-md-6 mb-2">
                                        <div class="preview-label">Empresa</div>
                                        <div class="preview-value" id="prev-empresa">-</div>
                                    </div>
                                    <div class="col-md-6 mb-2">
                                        <div class="preview-label">NIT/RUT</div>
                                        <div class="preview-value" id="prev-nit">-</div>
                                    </div>
                                    <div class="col-md-6 mb-2">
                                        <div class="preview-label">Representante</div>
                                        <div class="preview-value" id="prev-representante">-</div>
                                    </div>
                                    <div class="col-md-6 mb-2">
                                        <div class="preview-label">Email</div>
                                        <div class="preview-value" id="prev-email">-</div>
                                    </div>
                                </div>
                            </div>
                            <div class="preview-card">
                                <h6 class="text-primary mb-3"><i class="fas fa-hiking"></i> Servicios</h6>
                                <div id="prev-actividades">-</div>
                                <div class="preview-label mt-2">Capacidad</div>
                                <div class="preview-value" id="prev-capacidad">-</div>
                            </div>
                            <div class="preview-card">
                                <h6 class="text-primary mb-3"><i class="fas fa-map-marker-alt"></i> Ubicación</h6>
                                <div class="preview-value" id="prev-ubicacion">-</div>
                            </div>
                            <div class="preview-card">
                                <h6 class="text-primary mb-3"><i class="fas fa-info-circle"></i> Descripción</h6>
                                <div class="preview-value" id="prev-descripcion">-</div>
                            </div>

                            <div class="preview-card">
                                <h6 class="text-primary mb-3"><i class="fas fa-map"></i> Cobertura</h6>
                                <div class="preview-value" id="prev-cobertura">-</div>
                            </div>


                            <button type="button" id="confirmarDatosBtn" class="btn btn-success w-100 mb-3 mt-3">
                                Confirmar datos <i class="fas fa-check"></i>
                            </button>


                        </div>

                    </div>

                    <div class="wizard-actions">
                        <button class="btn btn-secondary-wizard" id="prevBtn" style="display:none;" onclick="changeStep(-1)">
                            <i class="fas fa-arrow-left"></i> Anterior
                        </button>

                        <button type="submit" class="btn btn-primary-wizard" id="nextBtn" onclick="changeStep(1)">
                            Registrar <i class="fas fa-check"></i>
                        </button>

                    </div>
                </div>
            </form>
        </div>
    </section>

    <?php
    include_once __DIR__ . '/../../layouts/footer_administrador.php';
    ?>
</body>

</html>