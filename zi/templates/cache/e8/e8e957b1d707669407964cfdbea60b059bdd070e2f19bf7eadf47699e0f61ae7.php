<?php

/* selling/form_penjualan.twig */
class __TwigTemplate_3db4c8244f6647b0febba057eb7e3a596cf639e23c607e88be41d81d9e6a5604 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<script type=\"text/javascript\">
var \$rate = \$(\"input[name=item_price]\");
var \$qty = \$(\"input[name=item_qty]\");
var value_item_kode = null;
var value_warehouse = null;
var validForm = {valid: false, msg: \"Harap data diisi terlebih dahulu\"};
var constraints = {
    item_kode: {presence: true},
    item_nama: {presence: true},
    item_qty: {presence: true},
    item_uom: {presence: true},
    item_price: {presence: true},
    actual_qty: {presence: true}
};
function cekStok(itemKode, warehouse)
{

    if(warehouse && itemKode) {
        console.log(warehouse);
        \$.get(\"";
        // line 20
        echo twig_escape_filter($this->env, (isset($context["url_stok_balance"]) ? $context["url_stok_balance"] : null), "html", null, true);
        echo "\", {item_kode: itemKode, warehouse: warehouse})
                .done(function (data) {
                    var actual_qty = data.rows.length > 0 ? round(data.rows[0].balance, 0) : 0;
                    \$('input[name=actual_qty]').val(actual_qty);
                });
    }
}

function cekBatch(itemKode, warehouse, batch)
{

    if(warehouse && itemKode && batch) {
        \$.get(\"";
        // line 32
        echo twig_escape_filter($this->env, $this->env->getExtension('slim')->urlFor("stok.balancebatch"), "html", null, true);
        echo "\", {item_kode: itemKode, warehouse: warehouse, batch_no:batch})
                .done(function (data) {
                    var actual_qty = data.rows.length > 0 ? data.rows[0].balance : 0;
                    \$('input[name=actual_batch]').val(round(actual_qty, 0));
                    \$('#actual_batch').html(\"Batch Aktual Item Stok \" + round(actual_qty, 2));
                });
    }
}//self.parent.paramsPage[\"jenis-tagihan\"]
function cekPricelist(id, pricelist)
{
    if(id) {
        \$.ajax(\"";
        // line 43
        echo twig_escape_filter($this->env, (isset($context["url_price_list"]) ? $context["url_price_list"] : null), "html", null, true);
        echo "\", {
            dataType: \"json\",
            data: {item_kode: id, price_list: pricelist}
        }).done(function (data) {
            //basic_rate
            var basic_rate = data.rows.length > 0 ? data.rows[0].price_list_rate : 0;
            \$('input[name=basic_rate]').val(round(basic_rate, 0));
            \$('input[name=basic_rate]').focus();
            \$('input[name=item_price]').val(round(basic_rate, 0));
            \$('input[name=item_price]').focus();
            \$('input[name=item_qty]').focus();
        });
    }
}
function showErrors(form, errors) {
    _.each(form.querySelectorAll(\"input[name], select[name]\"), function(input) {
        if(errors && errors[input.name]) {
            Messenger().post({
                message: errors[input.name],
                type: 'error',
                showCloseButton: true
            });
        }
    });
}
\$(function(){

    \$(\".label_has_batch_no\").hide();
    \$('form#form_item_entry').submit(function(e){
        e.preventDefault();
        var errors = validate(\$(this), constraints);
        if(validForm[\"valid\"] && !errors) {
            var formArray = \$(this).serializeArray();
            var result = {};
            _.map(formArray, function (k, v) {
                var name = k['name'],
                        objs = {};
                objs[name] = k['value'];
                _.assign(result, objs);
            });

            if(parseInt(result[\"item_qty\"]) <= 0) {
                Messenger().post({
                    message: \"Jumlah Item Harus diisi\",
                    type: 'error',
                    showCloseButton: true
                });
                return;
            }

            if (result[\"item_batch\"] !== \"\") {
                if (parseInt(result[\"actual_batch\"]) < parseInt(result[\"item_qty\"])) {
                    Messenger().post({
                        message: \"Jumlah Stok Item tidak mencukupi\",
                        type: 'error',
                        showCloseButton: true
                    });
                    return;
                }
            } else {
                if (parseInt(result[\"actual_qty\"]) < parseInt(result[\"item_qty\"])) {
                    Messenger().post({
                        message: \"Jumlah Stok Item tidak mencukupi\",
                        type: 'error',
                        showCloseButton: true
                    });

                    return;
                }
            }
            self.parent.insertData(result);
            self.parent.focus();
            tb_remove();

        } else {
            var form = document.querySelector(\"form#form_item_entry\");
            showErrors(form, errors);
        }

    });
    \$('input[name=actual_qty]').priceFormat({prefix:'',thousandsSeparator:',',centsSeparator:'',centsLimit: ''});
    \$('input[name=basic_rate]').priceFormat({prefix:'',thousandsSeparator:',',centsSeparator:'',centsLimit: ''});
    \$rate.priceFormat({prefix:'',thousandsSeparator:',',centsSeparator:'',centsLimit: ''});
    \$qty.priceFormat({prefix:'',thousandsSeparator:',',centsSeparator:'',centsLimit: ''});
    \$('input[name=basic_rate]').focus();
    \$rate.focus();
    \$qty.focus();

    \$(\".item_kode\").select2({
        width: \"100%\",
        minimumInputLength: 0,
        placeholder: \"Cari Item\",
        id: function (bond) {
            return bond.item_kode;
        },
        ajax: {
            url: '";
        // line 139
        echo twig_escape_filter($this->env, (isset($context["url_item"]) ? $context["url_item"] : null), "html", null, true);
        echo "',
            dataType: 'json',
            quietMillis: 100,
            data: function (term, page) {
                return { search: term, offset: (page - 1) * 15, limit: 15 };
            },
            results: function (data, page) {
                var more = (page * 15) < data.total;
                return {results: data.rows, more: more};
            }
        },
        initSelection: function(element, callback) {
            var id = \$(element).val();
            if (id !== \"\") {
                \$.ajax(\"";
        // line 153
        echo twig_escape_filter($this->env, (isset($context["url_item"]) ? $context["url_item"] : null), "html", null, true);
        echo "\", {
                    dataType: \"json\",
                    data: { search: id, offset: 0, limit: 1 }
                }).done(function(data) { callback(data.rows[0]); });
            }
        },
        escapeMarkup: function (markup) {
            return markup;
        },
        formatSelection: function (repo) {
            return repo.item_kode;
        },
        formatResult: function (repo) {
            var markup = '<div class=\"row\">' +
                    '<div class=\"col-sm-12\">' + repo.item_nama + '</div>' +
                    '<ul style=\"font-size: 8px;\">' +
                    '<li class=\"col-sm-12\">'+ repo.item_kode +'</li>' +
                    '<li class=\"col-sm-12\">'+ repo.item_uom +'</li>' +
                    '<li class=\"col-sm-12\">'+ repo.item_principal +'</li>' +
                    '<li class=\"col-sm-12\">'+ repo.item_grup+'</li>' +
                    '</ul>';

            markup += '</div>';

            return markup;
        }
    });
    \$(\".item_kode\").on(\"change\", function(e) {
        var data = e.added;
        \$(\"input[name=item_nama]\").val(data.item_nama);
        \$(\".item_uom\").select2(\"val\", data.item_uom);
        \$(\".item_batch\").select2(\"val\", \"\");
        \$(\".label_has_batch_no\").hide();
        validForm['valid'] = true;

        value_item_kode = data.item_kode;
        cekStok(value_item_kode, value_warehouse);
        cekPricelist(data.item_kode, self.parent.paramsPage[\"jenis-tagihan\"]);
    });
    \$(\".detail_gudang\").select2({
        width: \"100%\",
        minimumInputLength: 0,
        placeholder: \"Cari lokasi gudang\",
        id: function (bond) {
            return bond.id;
        },
        ajax: {
            url: '";
        // line 200
        echo twig_escape_filter($this->env, (isset($context["url_gudang"]) ? $context["url_gudang"] : null), "html", null, true);
        echo "',
            dataType: 'json',
            quietMillis: 100,
            data: function (term, page) {
                return { search: term, offset: (page - 1) * 15, limit: 15 };
            },
            results: function (data, page) {
                var more = (page * 15) < data.total;
                return {results: data.rows, more: more};
            }
        },
        initSelection: function(element, callback) {
            var id = \$(element).val();
            if (id !== \"\") {
                value_warehouse = id;
                var parent = \$(element).attr(\"name\");
                \$.ajax(\"";
        // line 216
        echo twig_escape_filter($this->env, (isset($context["url_gudang"]) ? $context["url_gudang"] : null), "html", null, true);
        echo "\", {
                    dataType: \"json\",
                    method: 'POST',
                    data: { search: id, offset: 0, limit: 1 }
                }).done(function(data) {
                    \$(\"input[name=\"+parent+\"_nama]\").val(data.rows[0].warehouse_nama);
                    callback(data.rows[0]);
                });

            }
        },
        escapeMarkup: function (markup) {
            return markup;
        },
        formatSelection: function (repo) {
            return repo.warehouse_nama;
        },
        formatResult: function (repo) {
            return repo.warehouse_nama;
        }
    });
    \$(\".detail_gudang\").on(\"change\", function(e) {
        var data = e.added,
                parent = \$(this).attr(\"name\");
        \$(\"input[name=\"+parent+\"_nama]\").val(data.warehouse_nama);
        value_warehouse = data.id;
        cekStok(value_item_kode, value_warehouse);
    });
    \$(\".item_uom\").select2({
        width: \"100%\",
        minimumInputLength: 0,
        placeholder: \"Cari Item Satuan\",
        id: function (bond) {
            return bond.uom_nama;
        },
        ajax: {
            url: '";
        // line 252
        echo twig_escape_filter($this->env, (isset($context["url_item_uom"]) ? $context["url_item_uom"] : null), "html", null, true);
        echo "',
            dataType: 'json',
            quietMillis: 100,
            data: function (term, page) {
                return { aktif: 'TRUE', sort:'uom_nama', order: 'asc', search: term, offset: (page - 1) * 15, limit: 15 };
            },
            results: function (data, page) {
                var more = (page * 15) < data.total;
                return {results: data.rows, more: more};
            }
        },
        initSelection: function(element, callback) {
            var id = \$(element).val();
            if (id !== \"\") {
                \$.ajax(\"";
        // line 266
        echo twig_escape_filter($this->env, (isset($context["url_item_uom"]) ? $context["url_item_uom"] : null), "html", null, true);
        echo "\", {
                    dataType: \"json\",
                    data: { search: id, offset: 0, limit: 1 }
                }).done(function(data) { callback(data.rows[0]); });
            }
        },
        escapeMarkup: function (markup) {
            return markup;
        },
        formatSelection: function (repo) {
            return repo.uom_nama;
        },
        formatResult: function (repo) {
            return repo.uom_nama;
        }
    });
    \$(\".item_batch\").select2({
        width: \"100%\",
        minimumInputLength: 0,
        placeholder: \"Cari Batch no.\",
        id: function (bond) {
            return bond.id;
        },
        ajax: {
            url: '";
        // line 290
        echo twig_escape_filter($this->env, (isset($context["url_item_batch"]) ? $context["url_item_batch"] : null), "html", null, true);
        echo "',
            dataType: 'json',
            quietMillis: 100,
            data: function (term, page) {
                return {
                    search: term,
                    offset: (page - 1) * 15,
                    limit: 15,
                    item_kode: value_item_kode
                };
            },
            results: function (data, page) {
                var more = (page * 15) < data.total;
                return {results: data.rows, more: more};
            }
        },
        initSelection: function(element, callback) {
            var id = \$(element).val();
            if (id !== \"\") {
                \$.ajax(\"";
        // line 309
        echo twig_escape_filter($this->env, (isset($context["url_item_batch"]) ? $context["url_item_batch"] : null), "html", null, true);
        echo "\", {
                    dataType: \"json\",
                    data: { search: id, offset: 0, limit: 1 }
                }).done(function(data) { callback(data.rows[0]); });
            }
        },
        escapeMarkup: function (markup) {
            return markup;
        },
        formatSelection: function (repo) {
            return repo.id;
        },
        formatResult: function (repo) {
            return repo.id;
        }
    });
    \$(\".item_batch\").on(\"change\", function(e){
        var data = e.added;
        validForm['valid'] = true;
        validForm['msg'] = \"Harap data diisi terlebih dahulu\";
        cekBatch(value_item_kode, value_warehouse, data.id);
        cekPricelist(value_item_kode, self.parent.paramsPage[\"jenis-tagihan\"]);
    });
    var dosis = \$(\"input[name=dosis]\").autocomplete({
        query: '',
        minLength: 0,
        delay: 0,
        autoFocus: false,
        source: function(request, response) {
          var that = this;
          \$.ajax({
              url: '";
        // line 340
        echo twig_escape_filter($this->env, (isset($context["url_dosis"]) ? $context["url_dosis"] : null), "html", null, true);
        echo "',
              dataType: 'json',
              quietMillis: 100,
              data: { search: request.term, offset: (1 - 1) * 15, limit: 15 },
              success: function (data) {
                var items = [];
                \$.each(data.rows, function (i, item) {
                    item = {
                        label: item.dosis || '',
                        value: item.dosis || ''
                    };
                    items.push(item);
                });
                response(items);
              }
            });
        }
    });
    dosis.bind(\"click\", function() {\$(this).autocomplete('search', \"\");});
    \$(\"input[name=dosis1]\").select2({
        width: \"100%\",
        minimumInputLength: 0,
        placeholder: \"Pilih Dosis\",
        id: function (bond) {
            return bond.dosis;
        },
        ajax: {
            url: '";
        // line 367
        echo twig_escape_filter($this->env, (isset($context["url_dosis"]) ? $context["url_dosis"] : null), "html", null, true);
        echo "',
            dataType: 'json',
            quietMillis: 100,
            data: function (term, page) {
                return { search: term, offset: (page - 1) * 15, limit: 15 };
            },
            results: function (data, page) {
                var more = (page * 15) < data.total;
                return {results: data.rows, more: more};
            }
        },
        initSelection: function(element, callback) {
            var id = \$(element).val();
            if (id !== \"\") {
                \$.ajax(\"";
        // line 381
        echo twig_escape_filter($this->env, (isset($context["url_dosis"]) ? $context["url_dosis"] : null), "html", null, true);
        echo "\", {
                    dataType: \"json\",
                    data: { search: id, offset: 0, limit: 1 }
                }).done(function(data) { callback(data.rows[0]); });
            }
        },
        escapeMarkup: function (markup) {
            return markup;
        },
        formatSelection: function (repo) {
            return repo.dosis;
        },
        formatResult: function (repo) {
            return repo.dosis;
        }
    });
    \$(\"#from_warehouse\").select2(\"val\", \"7c87a8d69bc21df012ae8e3b17c5fff7\");
    \$(\"#jenis_tagihan\").html(self.parent.paramsPage[\"jenis-tagihan\"]);
    /*    \$(\"#to_warehouse\").select2(\"val\", self.parent.warehouse['to_warehouse']);
     \$(\"#from_warehouse\").select2(\"val\", self.parent.warehouse['from_warehouse']);*/
});
</script>
<form id=\"form_item_entry\" class=\"form-horizontal\" role=\"form\">
    <h6 class=\"heading-hr\"><i class=\"icon-paragraph-right2\"></i>";
        // line 404
        echo twig_escape_filter($this->env, (isset($context["title"]) ? $context["title"] : null), "html", null, true);
        echo "</h6>
    <div class=\"row\">
        <div class=\"col-sm-12\">
            <div class=\"block-inner\">
                <div class=\"statistics-info\">
                    <a href=\"#\" title=\"\" class=\"bg-info\"><i class=\"icon-cart-plus\"></i></a>
                    <strong id=\"jenis_tagihan\"></strong>
                </div>
                <div class=\"progress progress-micro\">
                    <div class=\"progress-bar progress-bar-info\" role=\"progressbar\" aria-valuenow=\"90\" aria-valuemin=\"0\" aria-valuemax=\"100\" style=\"width: 35%;\">
                        <span class=\"sr-only\">30% Complete</span>
                    </div>
                </div>
                <span>Jenis Tagihan</span>
            </div>
        </div>
    </div>

    <div class=\"form-actions text-right\">
        <input type=\"submit\" value=\"Submit\" class=\"btn btn-primary\">
    </div>

    <div class=\"row\">
        <div class=\"col-sm-12\">
            <div class=\"block-inner\">
                <div class=\"block-inner\">
                    <h6 class=\"heading-hr\">
                        <i class=\"icon-user\"></i> Input Item<small class=\"display-block\">Form Input Item</small>
                    </h6>
                </div>
                <div class=\"panel-body\">
                    <div class=\"form-group\">
                        <div class=\"row\">
                            <div class=\"col-sm-4\">
                                <label>Barcode:</label>
                                <input type=\"text\" name=\"barcode\" class=\"form-control\" value=\"";
        // line 439
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["data"]) ? $context["data"] : null), "barcode", array()), "html", null, true);
        echo "\"/>
                            </div>
                            <div class=\"col-sm-6 label_has_batch_no\">
                                <div class=\"chat\">
                                    <div class=\"message\">
                                        <div class=\"message-body\">
                                            Field Batch no. harus diisi
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class=\"form-group\">
                        <div class=\"row\">
                            <div class=\"col-sm-4\">
                                <label>Kode Item:</label>
                                <input type=\"text\" name=\"item_kode\" class=\"item_kode\" value=\"";
        // line 456
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["data"]) ? $context["data"] : null), "item_kode", array()), "html", null, true);
        echo "\"/>
                            </div>

                            <div class=\"col-sm-6\">
                                <label>Nama Item:</label>
                                <input type=\"text\" name=\"item_nama\" class=\"form-control\" value=\"";
        // line 461
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["data"]) ? $context["data"] : null), "item_nama", array()), "html", null, true);
        echo "\" readonly/>
                            </div>
                        </div>
                    </div>

                    <div class=\"form-group\">
                        <div class=\"row\">
                            <div class=\"col-sm-4\">
                                    <span class=\"from_warehouse--label\">
                                    <label>Lokasi Gudang Item Asal:</label>
                                    <input type=\"hidden\" id=\"from_warehouse\" name=\"from_warehouse\" class=\"detail_gudang\" value=\"";
        // line 471
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["data"]) ? $context["data"] : null), "from_warehouse", array()), "html", null, true);
        echo "\" readonly/>
                                    <input type=\"hidden\" name=\"from_warehouse_nama\"/>
                                    </span>
                            </div>

                            <div class=\"col-sm-4\">
                                <label>Dosis:</label>
                                <input type=\"text\" id=\"dosis\" name=\"dosis\" class=\"form-control dosis\" value=\"";
        // line 478
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["data"]) ? $context["data"] : null), "dosis", array()), "html", null, true);
        echo "\"/>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <div class=\"row\">
        <div class=\"col-sm-12\">
            <div class=\"block-inner\">
                <div class=\"block-inner\">
                    <h6 class=\"heading-hr\">
                        <i class=\"icon-notebook\"></i> Harga dan Quantity  <small class=\"display-block\">Harga dan Quantity Item</small>
                    </h6>
                </div>
                <div class=\"panel-body\">
                    <div class=\"form-group\">
                        <div class=\"row\">
                            <div class=\"col-sm-4\">
                                <label>Quantity / Jumlah:</label>
                                <input type=\"text\" name=\"item_qty\" class=\"form-control cls-number\" value=\"";
        // line 501
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["data"]) ? $context["data"] : null), "item_qty", array()), "html", null, true);
        echo "\"/>
                                <span class=\"help-block\">Total banyak item</span>
                            </div>
                            <div class=\"col-sm-4\">
                                <label>Satuan Item | Unit of Measure:</label>
                                <input type=\"hidden\" name=\"item_uom\" class=\"item_uom\" value=\"";
        // line 506
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["data"]) ? $context["data"] : null), "item_uom", array()), "html", null, true);
        echo "\"/>
                                <span class=\"help-block\">Satuan per item</span>
                            </div>
                        </div>
                    </div>

                    <div class=\"form-group\">
                        <div class=\"row\">
                            <div class=\"col-sm-4\">
                                <label>Aktual Stok:</label>
                                <input type=\"text\" name=\"actual_qty\" class=\"form-control cls-number\" value=\"";
        // line 516
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["data"]) ? $context["data"] : null), "actual_qty", array()), "html", null, true);
        echo "\" readonly/>
                                <span class=\"help-block\">Jumlah Aktual Item Stok </span>
                            </div>
                            <div class=\"col-sm-4\">
                                <label>Harga Dasar Item Obat:</label>
                                <input type=\"text\" name=\"basic_rate\" class=\"form-control cls-number\" value=\"";
        // line 521
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["data"]) ? $context["data"] : null), "basic_rate", array()), "html", null, true);
        echo "\" readonly/>
                                <span class=\"help-block\">Harga Dasar Item Obat </span>
                            </div>
                        </div>
                    </div>

                    <div class=\"form-group\">
                        <div class=\"row\">
                            <div class=\"col-sm-4\">
                                <label>Harga Item:</label>
                                <input type=\"text\" name=\"item_price\" class=\"form-control cls-number\" value=\"";
        // line 531
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["data"]) ? $context["data"] : null), "item_price", array()), "html", null, true);
        echo "\"/>
                                <span class=\"help-block\">Harga per Satuan Item </span>
                            </div>

                        </div>
                    </div>

                    <div class=\"form-group\">
                        <div class=\"row\">
                            <div class=\"col-sm-4\">
                                <label>Serial no:</label>
                                <input type=\"hidden\" name=\"item_serial\" class=\"item_serial\" value=\"";
        // line 542
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["data"]) ? $context["data"] : null), "item_serial", array()), "html", null, true);
        echo "\"/>
                                <span class=\"help-block\">Harga per Satuan Item </span>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</form>
";
    }

    public function getTemplateName()
    {
        return "selling/form_penjualan.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  637 => 542,  623 => 531,  610 => 521,  602 => 516,  589 => 506,  581 => 501,  555 => 478,  545 => 471,  532 => 461,  524 => 456,  504 => 439,  466 => 404,  440 => 381,  423 => 367,  393 => 340,  359 => 309,  337 => 290,  310 => 266,  293 => 252,  254 => 216,  235 => 200,  185 => 153,  168 => 139,  69 => 43,  55 => 32,  40 => 20,  19 => 1,);
    }
}
/* <script type="text/javascript">*/
/* var $rate = $("input[name=item_price]");*/
/* var $qty = $("input[name=item_qty]");*/
/* var value_item_kode = null;*/
/* var value_warehouse = null;*/
/* var validForm = {valid: false, msg: "Harap data diisi terlebih dahulu"};*/
/* var constraints = {*/
/*     item_kode: {presence: true},*/
/*     item_nama: {presence: true},*/
/*     item_qty: {presence: true},*/
/*     item_uom: {presence: true},*/
/*     item_price: {presence: true},*/
/*     actual_qty: {presence: true}*/
/* };*/
/* function cekStok(itemKode, warehouse)*/
/* {*/
/* */
/*     if(warehouse && itemKode) {*/
/*         console.log(warehouse);*/
/*         $.get("{{ url_stok_balance }}", {item_kode: itemKode, warehouse: warehouse})*/
/*                 .done(function (data) {*/
/*                     var actual_qty = data.rows.length > 0 ? round(data.rows[0].balance, 0) : 0;*/
/*                     $('input[name=actual_qty]').val(actual_qty);*/
/*                 });*/
/*     }*/
/* }*/
/* */
/* function cekBatch(itemKode, warehouse, batch)*/
/* {*/
/* */
/*     if(warehouse && itemKode && batch) {*/
/*         $.get("{{ urlFor('stok.balancebatch') }}", {item_kode: itemKode, warehouse: warehouse, batch_no:batch})*/
/*                 .done(function (data) {*/
/*                     var actual_qty = data.rows.length > 0 ? data.rows[0].balance : 0;*/
/*                     $('input[name=actual_batch]').val(round(actual_qty, 0));*/
/*                     $('#actual_batch').html("Batch Aktual Item Stok " + round(actual_qty, 2));*/
/*                 });*/
/*     }*/
/* }//self.parent.paramsPage["jenis-tagihan"]*/
/* function cekPricelist(id, pricelist)*/
/* {*/
/*     if(id) {*/
/*         $.ajax("{{url_price_list}}", {*/
/*             dataType: "json",*/
/*             data: {item_kode: id, price_list: pricelist}*/
/*         }).done(function (data) {*/
/*             //basic_rate*/
/*             var basic_rate = data.rows.length > 0 ? data.rows[0].price_list_rate : 0;*/
/*             $('input[name=basic_rate]').val(round(basic_rate, 0));*/
/*             $('input[name=basic_rate]').focus();*/
/*             $('input[name=item_price]').val(round(basic_rate, 0));*/
/*             $('input[name=item_price]').focus();*/
/*             $('input[name=item_qty]').focus();*/
/*         });*/
/*     }*/
/* }*/
/* function showErrors(form, errors) {*/
/*     _.each(form.querySelectorAll("input[name], select[name]"), function(input) {*/
/*         if(errors && errors[input.name]) {*/
/*             Messenger().post({*/
/*                 message: errors[input.name],*/
/*                 type: 'error',*/
/*                 showCloseButton: true*/
/*             });*/
/*         }*/
/*     });*/
/* }*/
/* $(function(){*/
/* */
/*     $(".label_has_batch_no").hide();*/
/*     $('form#form_item_entry').submit(function(e){*/
/*         e.preventDefault();*/
/*         var errors = validate($(this), constraints);*/
/*         if(validForm["valid"] && !errors) {*/
/*             var formArray = $(this).serializeArray();*/
/*             var result = {};*/
/*             _.map(formArray, function (k, v) {*/
/*                 var name = k['name'],*/
/*                         objs = {};*/
/*                 objs[name] = k['value'];*/
/*                 _.assign(result, objs);*/
/*             });*/
/* */
/*             if(parseInt(result["item_qty"]) <= 0) {*/
/*                 Messenger().post({*/
/*                     message: "Jumlah Item Harus diisi",*/
/*                     type: 'error',*/
/*                     showCloseButton: true*/
/*                 });*/
/*                 return;*/
/*             }*/
/* */
/*             if (result["item_batch"] !== "") {*/
/*                 if (parseInt(result["actual_batch"]) < parseInt(result["item_qty"])) {*/
/*                     Messenger().post({*/
/*                         message: "Jumlah Stok Item tidak mencukupi",*/
/*                         type: 'error',*/
/*                         showCloseButton: true*/
/*                     });*/
/*                     return;*/
/*                 }*/
/*             } else {*/
/*                 if (parseInt(result["actual_qty"]) < parseInt(result["item_qty"])) {*/
/*                     Messenger().post({*/
/*                         message: "Jumlah Stok Item tidak mencukupi",*/
/*                         type: 'error',*/
/*                         showCloseButton: true*/
/*                     });*/
/* */
/*                     return;*/
/*                 }*/
/*             }*/
/*             self.parent.insertData(result);*/
/*             self.parent.focus();*/
/*             tb_remove();*/
/* */
/*         } else {*/
/*             var form = document.querySelector("form#form_item_entry");*/
/*             showErrors(form, errors);*/
/*         }*/
/* */
/*     });*/
/*     $('input[name=actual_qty]').priceFormat({prefix:'',thousandsSeparator:',',centsSeparator:'',centsLimit: ''});*/
/*     $('input[name=basic_rate]').priceFormat({prefix:'',thousandsSeparator:',',centsSeparator:'',centsLimit: ''});*/
/*     $rate.priceFormat({prefix:'',thousandsSeparator:',',centsSeparator:'',centsLimit: ''});*/
/*     $qty.priceFormat({prefix:'',thousandsSeparator:',',centsSeparator:'',centsLimit: ''});*/
/*     $('input[name=basic_rate]').focus();*/
/*     $rate.focus();*/
/*     $qty.focus();*/
/* */
/*     $(".item_kode").select2({*/
/*         width: "100%",*/
/*         minimumInputLength: 0,*/
/*         placeholder: "Cari Item",*/
/*         id: function (bond) {*/
/*             return bond.item_kode;*/
/*         },*/
/*         ajax: {*/
/*             url: '{{url_item}}',*/
/*             dataType: 'json',*/
/*             quietMillis: 100,*/
/*             data: function (term, page) {*/
/*                 return { search: term, offset: (page - 1) * 15, limit: 15 };*/
/*             },*/
/*             results: function (data, page) {*/
/*                 var more = (page * 15) < data.total;*/
/*                 return {results: data.rows, more: more};*/
/*             }*/
/*         },*/
/*         initSelection: function(element, callback) {*/
/*             var id = $(element).val();*/
/*             if (id !== "") {*/
/*                 $.ajax("{{url_item}}", {*/
/*                     dataType: "json",*/
/*                     data: { search: id, offset: 0, limit: 1 }*/
/*                 }).done(function(data) { callback(data.rows[0]); });*/
/*             }*/
/*         },*/
/*         escapeMarkup: function (markup) {*/
/*             return markup;*/
/*         },*/
/*         formatSelection: function (repo) {*/
/*             return repo.item_kode;*/
/*         },*/
/*         formatResult: function (repo) {*/
/*             var markup = '<div class="row">' +*/
/*                     '<div class="col-sm-12">' + repo.item_nama + '</div>' +*/
/*                     '<ul style="font-size: 8px;">' +*/
/*                     '<li class="col-sm-12">'+ repo.item_kode +'</li>' +*/
/*                     '<li class="col-sm-12">'+ repo.item_uom +'</li>' +*/
/*                     '<li class="col-sm-12">'+ repo.item_principal +'</li>' +*/
/*                     '<li class="col-sm-12">'+ repo.item_grup+'</li>' +*/
/*                     '</ul>';*/
/* */
/*             markup += '</div>';*/
/* */
/*             return markup;*/
/*         }*/
/*     });*/
/*     $(".item_kode").on("change", function(e) {*/
/*         var data = e.added;*/
/*         $("input[name=item_nama]").val(data.item_nama);*/
/*         $(".item_uom").select2("val", data.item_uom);*/
/*         $(".item_batch").select2("val", "");*/
/*         $(".label_has_batch_no").hide();*/
/*         validForm['valid'] = true;*/
/* */
/*         value_item_kode = data.item_kode;*/
/*         cekStok(value_item_kode, value_warehouse);*/
/*         cekPricelist(data.item_kode, self.parent.paramsPage["jenis-tagihan"]);*/
/*     });*/
/*     $(".detail_gudang").select2({*/
/*         width: "100%",*/
/*         minimumInputLength: 0,*/
/*         placeholder: "Cari lokasi gudang",*/
/*         id: function (bond) {*/
/*             return bond.id;*/
/*         },*/
/*         ajax: {*/
/*             url: '{{url_gudang}}',*/
/*             dataType: 'json',*/
/*             quietMillis: 100,*/
/*             data: function (term, page) {*/
/*                 return { search: term, offset: (page - 1) * 15, limit: 15 };*/
/*             },*/
/*             results: function (data, page) {*/
/*                 var more = (page * 15) < data.total;*/
/*                 return {results: data.rows, more: more};*/
/*             }*/
/*         },*/
/*         initSelection: function(element, callback) {*/
/*             var id = $(element).val();*/
/*             if (id !== "") {*/
/*                 value_warehouse = id;*/
/*                 var parent = $(element).attr("name");*/
/*                 $.ajax("{{url_gudang}}", {*/
/*                     dataType: "json",*/
/*                     method: 'POST',*/
/*                     data: { search: id, offset: 0, limit: 1 }*/
/*                 }).done(function(data) {*/
/*                     $("input[name="+parent+"_nama]").val(data.rows[0].warehouse_nama);*/
/*                     callback(data.rows[0]);*/
/*                 });*/
/* */
/*             }*/
/*         },*/
/*         escapeMarkup: function (markup) {*/
/*             return markup;*/
/*         },*/
/*         formatSelection: function (repo) {*/
/*             return repo.warehouse_nama;*/
/*         },*/
/*         formatResult: function (repo) {*/
/*             return repo.warehouse_nama;*/
/*         }*/
/*     });*/
/*     $(".detail_gudang").on("change", function(e) {*/
/*         var data = e.added,*/
/*                 parent = $(this).attr("name");*/
/*         $("input[name="+parent+"_nama]").val(data.warehouse_nama);*/
/*         value_warehouse = data.id;*/
/*         cekStok(value_item_kode, value_warehouse);*/
/*     });*/
/*     $(".item_uom").select2({*/
/*         width: "100%",*/
/*         minimumInputLength: 0,*/
/*         placeholder: "Cari Item Satuan",*/
/*         id: function (bond) {*/
/*             return bond.uom_nama;*/
/*         },*/
/*         ajax: {*/
/*             url: '{{url_item_uom}}',*/
/*             dataType: 'json',*/
/*             quietMillis: 100,*/
/*             data: function (term, page) {*/
/*                 return { aktif: 'TRUE', sort:'uom_nama', order: 'asc', search: term, offset: (page - 1) * 15, limit: 15 };*/
/*             },*/
/*             results: function (data, page) {*/
/*                 var more = (page * 15) < data.total;*/
/*                 return {results: data.rows, more: more};*/
/*             }*/
/*         },*/
/*         initSelection: function(element, callback) {*/
/*             var id = $(element).val();*/
/*             if (id !== "") {*/
/*                 $.ajax("{{url_item_uom}}", {*/
/*                     dataType: "json",*/
/*                     data: { search: id, offset: 0, limit: 1 }*/
/*                 }).done(function(data) { callback(data.rows[0]); });*/
/*             }*/
/*         },*/
/*         escapeMarkup: function (markup) {*/
/*             return markup;*/
/*         },*/
/*         formatSelection: function (repo) {*/
/*             return repo.uom_nama;*/
/*         },*/
/*         formatResult: function (repo) {*/
/*             return repo.uom_nama;*/
/*         }*/
/*     });*/
/*     $(".item_batch").select2({*/
/*         width: "100%",*/
/*         minimumInputLength: 0,*/
/*         placeholder: "Cari Batch no.",*/
/*         id: function (bond) {*/
/*             return bond.id;*/
/*         },*/
/*         ajax: {*/
/*             url: '{{url_item_batch}}',*/
/*             dataType: 'json',*/
/*             quietMillis: 100,*/
/*             data: function (term, page) {*/
/*                 return {*/
/*                     search: term,*/
/*                     offset: (page - 1) * 15,*/
/*                     limit: 15,*/
/*                     item_kode: value_item_kode*/
/*                 };*/
/*             },*/
/*             results: function (data, page) {*/
/*                 var more = (page * 15) < data.total;*/
/*                 return {results: data.rows, more: more};*/
/*             }*/
/*         },*/
/*         initSelection: function(element, callback) {*/
/*             var id = $(element).val();*/
/*             if (id !== "") {*/
/*                 $.ajax("{{url_item_batch}}", {*/
/*                     dataType: "json",*/
/*                     data: { search: id, offset: 0, limit: 1 }*/
/*                 }).done(function(data) { callback(data.rows[0]); });*/
/*             }*/
/*         },*/
/*         escapeMarkup: function (markup) {*/
/*             return markup;*/
/*         },*/
/*         formatSelection: function (repo) {*/
/*             return repo.id;*/
/*         },*/
/*         formatResult: function (repo) {*/
/*             return repo.id;*/
/*         }*/
/*     });*/
/*     $(".item_batch").on("change", function(e){*/
/*         var data = e.added;*/
/*         validForm['valid'] = true;*/
/*         validForm['msg'] = "Harap data diisi terlebih dahulu";*/
/*         cekBatch(value_item_kode, value_warehouse, data.id);*/
/*         cekPricelist(value_item_kode, self.parent.paramsPage["jenis-tagihan"]);*/
/*     });*/
/*     var dosis = $("input[name=dosis]").autocomplete({*/
/*         query: '',*/
/*         minLength: 0,*/
/*         delay: 0,*/
/*         autoFocus: false,*/
/*         source: function(request, response) {*/
/*           var that = this;*/
/*           $.ajax({*/
/*               url: '{{url_dosis}}',*/
/*               dataType: 'json',*/
/*               quietMillis: 100,*/
/*               data: { search: request.term, offset: (1 - 1) * 15, limit: 15 },*/
/*               success: function (data) {*/
/*                 var items = [];*/
/*                 $.each(data.rows, function (i, item) {*/
/*                     item = {*/
/*                         label: item.dosis || '',*/
/*                         value: item.dosis || ''*/
/*                     };*/
/*                     items.push(item);*/
/*                 });*/
/*                 response(items);*/
/*               }*/
/*             });*/
/*         }*/
/*     });*/
/*     dosis.bind("click", function() {$(this).autocomplete('search', "");});*/
/*     $("input[name=dosis1]").select2({*/
/*         width: "100%",*/
/*         minimumInputLength: 0,*/
/*         placeholder: "Pilih Dosis",*/
/*         id: function (bond) {*/
/*             return bond.dosis;*/
/*         },*/
/*         ajax: {*/
/*             url: '{{url_dosis}}',*/
/*             dataType: 'json',*/
/*             quietMillis: 100,*/
/*             data: function (term, page) {*/
/*                 return { search: term, offset: (page - 1) * 15, limit: 15 };*/
/*             },*/
/*             results: function (data, page) {*/
/*                 var more = (page * 15) < data.total;*/
/*                 return {results: data.rows, more: more};*/
/*             }*/
/*         },*/
/*         initSelection: function(element, callback) {*/
/*             var id = $(element).val();*/
/*             if (id !== "") {*/
/*                 $.ajax("{{url_dosis}}", {*/
/*                     dataType: "json",*/
/*                     data: { search: id, offset: 0, limit: 1 }*/
/*                 }).done(function(data) { callback(data.rows[0]); });*/
/*             }*/
/*         },*/
/*         escapeMarkup: function (markup) {*/
/*             return markup;*/
/*         },*/
/*         formatSelection: function (repo) {*/
/*             return repo.dosis;*/
/*         },*/
/*         formatResult: function (repo) {*/
/*             return repo.dosis;*/
/*         }*/
/*     });*/
/*     $("#from_warehouse").select2("val", "7c87a8d69bc21df012ae8e3b17c5fff7");*/
/*     $("#jenis_tagihan").html(self.parent.paramsPage["jenis-tagihan"]);*/
/*     /*    $("#to_warehouse").select2("val", self.parent.warehouse['to_warehouse']);*/
/*      $("#from_warehouse").select2("val", self.parent.warehouse['from_warehouse']);*//* */
/* });*/
/* </script>*/
/* <form id="form_item_entry" class="form-horizontal" role="form">*/
/*     <h6 class="heading-hr"><i class="icon-paragraph-right2"></i>{{ title }}</h6>*/
/*     <div class="row">*/
/*         <div class="col-sm-12">*/
/*             <div class="block-inner">*/
/*                 <div class="statistics-info">*/
/*                     <a href="#" title="" class="bg-info"><i class="icon-cart-plus"></i></a>*/
/*                     <strong id="jenis_tagihan"></strong>*/
/*                 </div>*/
/*                 <div class="progress progress-micro">*/
/*                     <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100" style="width: 35%;">*/
/*                         <span class="sr-only">30% Complete</span>*/
/*                     </div>*/
/*                 </div>*/
/*                 <span>Jenis Tagihan</span>*/
/*             </div>*/
/*         </div>*/
/*     </div>*/
/* */
/*     <div class="form-actions text-right">*/
/*         <input type="submit" value="Submit" class="btn btn-primary">*/
/*     </div>*/
/* */
/*     <div class="row">*/
/*         <div class="col-sm-12">*/
/*             <div class="block-inner">*/
/*                 <div class="block-inner">*/
/*                     <h6 class="heading-hr">*/
/*                         <i class="icon-user"></i> Input Item<small class="display-block">Form Input Item</small>*/
/*                     </h6>*/
/*                 </div>*/
/*                 <div class="panel-body">*/
/*                     <div class="form-group">*/
/*                         <div class="row">*/
/*                             <div class="col-sm-4">*/
/*                                 <label>Barcode:</label>*/
/*                                 <input type="text" name="barcode" class="form-control" value="{{ data.barcode }}"/>*/
/*                             </div>*/
/*                             <div class="col-sm-6 label_has_batch_no">*/
/*                                 <div class="chat">*/
/*                                     <div class="message">*/
/*                                         <div class="message-body">*/
/*                                             Field Batch no. harus diisi*/
/*                                         </div>*/
/*                                     </div>*/
/*                                 </div>*/
/*                             </div>*/
/*                         </div>*/
/*                     </div>*/
/*                     <div class="form-group">*/
/*                         <div class="row">*/
/*                             <div class="col-sm-4">*/
/*                                 <label>Kode Item:</label>*/
/*                                 <input type="text" name="item_kode" class="item_kode" value="{{ data.item_kode }}"/>*/
/*                             </div>*/
/* */
/*                             <div class="col-sm-6">*/
/*                                 <label>Nama Item:</label>*/
/*                                 <input type="text" name="item_nama" class="form-control" value="{{ data.item_nama }}" readonly/>*/
/*                             </div>*/
/*                         </div>*/
/*                     </div>*/
/* */
/*                     <div class="form-group">*/
/*                         <div class="row">*/
/*                             <div class="col-sm-4">*/
/*                                     <span class="from_warehouse--label">*/
/*                                     <label>Lokasi Gudang Item Asal:</label>*/
/*                                     <input type="hidden" id="from_warehouse" name="from_warehouse" class="detail_gudang" value="{{data.from_warehouse}}" readonly/>*/
/*                                     <input type="hidden" name="from_warehouse_nama"/>*/
/*                                     </span>*/
/*                             </div>*/
/* */
/*                             <div class="col-sm-4">*/
/*                                 <label>Dosis:</label>*/
/*                                 <input type="text" id="dosis" name="dosis" class="form-control dosis" value="{{data.dosis}}"/>*/
/*                             </div>*/
/*                         </div>*/
/*                     </div>*/
/* */
/*                 </div>*/
/*             </div>*/
/*         </div>*/
/*     </div>*/
/* */
/*     <div class="row">*/
/*         <div class="col-sm-12">*/
/*             <div class="block-inner">*/
/*                 <div class="block-inner">*/
/*                     <h6 class="heading-hr">*/
/*                         <i class="icon-notebook"></i> Harga dan Quantity  <small class="display-block">Harga dan Quantity Item</small>*/
/*                     </h6>*/
/*                 </div>*/
/*                 <div class="panel-body">*/
/*                     <div class="form-group">*/
/*                         <div class="row">*/
/*                             <div class="col-sm-4">*/
/*                                 <label>Quantity / Jumlah:</label>*/
/*                                 <input type="text" name="item_qty" class="form-control cls-number" value="{{data.item_qty}}"/>*/
/*                                 <span class="help-block">Total banyak item</span>*/
/*                             </div>*/
/*                             <div class="col-sm-4">*/
/*                                 <label>Satuan Item | Unit of Measure:</label>*/
/*                                 <input type="hidden" name="item_uom" class="item_uom" value="{{data.item_uom}}"/>*/
/*                                 <span class="help-block">Satuan per item</span>*/
/*                             </div>*/
/*                         </div>*/
/*                     </div>*/
/* */
/*                     <div class="form-group">*/
/*                         <div class="row">*/
/*                             <div class="col-sm-4">*/
/*                                 <label>Aktual Stok:</label>*/
/*                                 <input type="text" name="actual_qty" class="form-control cls-number" value="{{data.actual_qty}}" readonly/>*/
/*                                 <span class="help-block">Jumlah Aktual Item Stok </span>*/
/*                             </div>*/
/*                             <div class="col-sm-4">*/
/*                                 <label>Harga Dasar Item Obat:</label>*/
/*                                 <input type="text" name="basic_rate" class="form-control cls-number" value="{{data.basic_rate}}" readonly/>*/
/*                                 <span class="help-block">Harga Dasar Item Obat </span>*/
/*                             </div>*/
/*                         </div>*/
/*                     </div>*/
/* */
/*                     <div class="form-group">*/
/*                         <div class="row">*/
/*                             <div class="col-sm-4">*/
/*                                 <label>Harga Item:</label>*/
/*                                 <input type="text" name="item_price" class="form-control cls-number" value="{{data.item_price}}"/>*/
/*                                 <span class="help-block">Harga per Satuan Item </span>*/
/*                             </div>*/
/* */
/*                         </div>*/
/*                     </div>*/
/* */
/*                     <div class="form-group">*/
/*                         <div class="row">*/
/*                             <div class="col-sm-4">*/
/*                                 <label>Serial no:</label>*/
/*                                 <input type="hidden" name="item_serial" class="item_serial" value="{{data.item_serial}}"/>*/
/*                                 <span class="help-block">Harga per Satuan Item </span>*/
/*                             </div>*/
/* */
/*                         </div>*/
/*                     </div>*/
/* */
/*                 </div>*/
/*             </div>*/
/*         </div>*/
/*     </div>*/
/* </form>*/
/* */
