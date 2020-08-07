<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <title>Document</title>
</head>

<body>
    <div class="container align-content-center">
    <div class="container col-10" id="kt_content">
        <!--Card - headers-->
        <div class="card card-custom">
            <!--begin::Header-->
            <div class="card-header card-header-tabs-line">
                <ul class="nav nav-dark nav-bold nav-tabs nav-tabs-line" data-remember-tab="tab_id" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#kt_builder_page" role="tab">Usuários</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#kt_builder_header" role="tab">Quartos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#kt_builder_subheader" role="tab">Pedidos</a>
                    </li>
                </ul>
            </div>
            <!--end::Header-->
                <!--begin::Body-->
                <div class="card-body">
                    <div class="tab-content pt-3">
                        <!-- Card1 -->
                        <div class="tab-pane active" id="kt_builder_page">
                            <div class="container align">
                                
                            </div>
                        </div>
                        <!-- Card2 -->
                        <div class="tab-pane" id="kt_builder_header">
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label text-lg-right">Desktop Fixed Header:</label>
                                <div class="col-lg-9 col-xl-4">
                                    <input type="hidden" name="builder[layout][header][self][fixed][desktop]" value="false">
                                    <span class="switch switch-icon">
                                        <label>
                                            <input type="checkbox" name="builder[layout][header][self][fixed][desktop]" value="true" checked="checked">
                                            <span></span>
                                        </label>
                                    </span>
                                    <div class="form-text text-muted">Enable fixed header for desktop mode</div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label text-lg-right">Header Menu Arrows:</label>
                                <div class="col-lg-9 col-xl-4">
                                    <input type="hidden" name="builder[layout][header][menu][self][root-arrow]" value="false">
                                    <span class="switch switch-icon">
                                        <label>
                                            <input type="checkbox" name="builder[layout][header][menu][self][root-arrow]" value="true" checked="checked">
                                            <span></span>
                                        </label>
                                    </span>
                                    <div class="form-text text-muted">Enable header menu root link arrows</div>
                                </div>
                            </div>
                        </div>
                        <!-- Card3 -->
                        <div class="tab-pane" id="kt_builder_subheader">
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label text-lg-right">Layout:</label>
                                <div class="col-lg-9 col-xl-4">
                                    <select class="form-control form-control-solid" name="builder[layout][subheader][layout]">
                                        <option value="subheader-v1" selected="selected">Subheader v1</option>
                                        <option value="subheader-v2">Subheader v2</option>
                                        <option value="subheader-v3">Subheader v3</option>
                                        <option value="subheader-v4">Subheader v4</option>
                                        <option value="subheader-v5">Subheader v5</option>
                                    </select>
                                    <div class="form-text text-muted">Select subheader layout</div>
                                </div>
                            </div>
                        </div>
                        <!-- Card4 -->
                        <div class="tab-pane" id="kt_builder_aside">
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label text-lg-right">Display:</label>
                                <div class="col-lg-9 col-xl-4">
                                    <span class="switch switch-icon">
                                        <input type="hidden" name="builder[layout][aside][self][display]" value="false">
                                        <label>
                                            <input type="checkbox" name="builder[layout][aside][self][display]" value="true">
                                            <span></span>
                                        </label>
                                    </span>
                                    <div class="form-text text-muted">Display aside</div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label text-lg-right">Submenu Toggle:</label>
                                <div class="col-lg-9 col-xl-4">
                                    <select class="form-control form-control-solid" name="builder[layout][aside][menu][dropdown]">
                                        <option value="true">Dropdown</option>
                                        <option value="false" selected="selected">Accordion</option>
                                    </select>
                                    <div class="form-text text-muted">Select submenu toggle mode(works only when
                                        <code>Fixed Mode</code>is disabled="disabled")</div>
                                </div>
                            </div>
                        </div>
                        <!--end::Tab Pane-->
                    </div>
                </div>
                <!--end::Body-->
        </div>
    </div>
    </div>
</body>

</html>