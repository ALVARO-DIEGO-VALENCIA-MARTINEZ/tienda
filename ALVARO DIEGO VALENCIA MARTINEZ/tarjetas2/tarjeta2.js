const form = document.getElementById('producto_formulario');
const cardContainer = document.getElementById('cardContainer');


form.addEventListener('submit', function (carta) {
  carta.preventDefault(); 

  
  const productName = document.getElementById('Nombre_producto').value;
  const productDescription = document.getElementById('Descripción_producto').value;
  const productPrice = document.getElementById('producto_Precio').value;
  const productImage = document.getElementById('Imagen_Producto').files[0];

  
  
  
  const imageUrl = URL.createObjectURL(productImage);

  
  const card = document.createElement('div');
  card.classList.add('card');
  card.innerHTML = `
    <img src="${imageUrl}" alt="${productName}">
    <h3>${productName}</h3>
    <p>${productDescription}</p>
    <span>$${productPrice}</span>
  `;

 
  cardContainer.appendChild(card);

 
  form.reset();
});