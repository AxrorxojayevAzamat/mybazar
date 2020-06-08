
var search_input = document.getElementById('search-input');
    
    for (i=0;i<search_input.length;i++){
        if (search_input[i].parentNode.tagName.toString().toLowerCase() == 'div') {
            search_input[i].onfocus = function(){
                // this.parentNode.addCSS('border':'1px solid blue');
                this.parentNode.style.border = '1px solid #0042ff';
            }
            search_input[i].onblur = function(){
                // this.parentNode.addCSS('border':'1px solid grey');

                this.parentNode.style.border = '1px solid #d1d8e0';
            }
        }
    }