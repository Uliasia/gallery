String.prototype.truncate = function(length, truncation) {
  length = length || 30;
  if (this.length <= length) {
    return this.valueOf();
  }
  truncation = truncation || '...';
  return this.slice(0, length - truncation.length) + truncation;
};
    
// const descrip = document.querySelectorAll("p");

// for (const element of descrip) {
//   element.innerText = element.innerText.truncate(120);
// }

document.addEventListener("DOMContentLoaded", function handler (event) {
	const pagination = document.querySelectorAll('.nav-link');
	const f = document.querySelector(".abc");

	const descrip = document.querySelectorAll("p");

for (const element of descrip) {
  element.innerText = element.innerText.truncate(120);
}
       
  pagination.forEach(element => {
    element.addEventListener('click', async function(e) {
			e.preventDefault();
			let page = this.getAttribute('data-page');
      const url = 'http://localhost/gallery/scripts/ajax_pagination';
        fetch(url, {
					method: "POST",
					mode: 'same-origin',
					headers: {'Content-Type':'application/json'},
      		body: JSON.stringify({page: page})
				})
				.then(  
          function(response) {  
            if (response.status !== 200) {  
              console.log('Looks like there was a problem. Status Code: ' +  
                response.status);  
              return;  
            }
      
            // Examine the text in the response  
						response.text()
						.then(function(data) {  
							f.innerHTML = data;
							console.log(data);
							handler()
            });  
            }
          )  
          .catch(function(err) {  
            console.log('Fetch Error :-S', err);  
          });
    });
  });
});

