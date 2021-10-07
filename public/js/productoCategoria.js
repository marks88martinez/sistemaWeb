$( "#cat_id" ).change(function() {
    // num =  displayCat();
    // selectSub(num);
    
});

function displayCat() {
     multipleValues = $( "#cat_id" ).val() || [];
     return multipleValues
   // alert("Funk: "+multipleValues)
}

function selectSub(num) {
    $("#select_sub").append(function() {
        return `<label for="exampleInputEmail1">SubCategorias -- `+num+`</label>
                <div class="form-group">
                    <select name="subcategorias_id" id="" class="form-control">
                     <option value="">SubCategoria</option>'
                    </select>
               </div>`;
    });
}
   
   
 
