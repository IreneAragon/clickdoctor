
$(document).ready(function(){
    $(".mul-select").select2({
            placeholder: "Elige una o varias especialidades",
            tags: true,
            tokenSeparators: ['/',',',';'," "]
        });
    })
