
var search_input = document.getElementsByClassName('bordered-input');

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

    const tagContainer = document.querySelector('.search-bar');
    const input = document.querySelector('.search-bar input');
    
    let tags = [];
    
    function createTag(label) {
      const div = document.createElement('div');
      div.setAttribute('class', 'tag');
      const span = document.createElement('span');
      span.innerHTML = label;
      const closeIcon = document.createElement('i');
      closeIcon.innerHTML = 'close';
      closeIcon.setAttribute('class', 'material-icons');
      closeIcon.setAttribute('data-item', label);
      div.appendChild(span);
      div.appendChild(closeIcon);
      return div;
    }
    
    function clearTags() {
      document.querySelectorAll('.tag').forEach(tag => {
        tag.parentElement.removeChild(tag);
      });
    }
    
    function addTags() {
      clearTags();
      tags.slice().reverse().forEach(tag => {
        tagContainer.prepend(createTag(tag));
      });
    }
    
    input.addEventListener('keyup', (e) => {
        if (e.key === 'Enter') {
          e.target.value.split(',').forEach(tag => {
            tags.push(tag);  
          });
          
          addTags();
          input.value = '';
        }
    });
    document.addEventListener('click', (e) => {
      console.log(e.target.tagName);
      if (e.target.tagName === 'I') {
        const tagLabel = e.target.getAttribute('data-item');
        const index = tags.indexOf(tagLabel);
        tags = [...tags.slice(0, index), ...tags.slice(index+1)];
        addTags();    
      }
    })
    
    input.focus();
    
    