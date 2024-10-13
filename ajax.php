<script>

    function ajaxServerGetRequest():  {

            console.log("DELETE CART");
            console.log(id_panier);
            console.log(id_variety);

            const quantite = document.querySelector('.quantity');
            const total = document.querySelector('#total');

            const panier = document.querySelector('.cart-list ul');
            const panierParent = document.querySelector('.cart-list');
            const newPanier = document.createElement('ul');


            $.ajax({

                url: "http://web.test/api/delete_cart",
                type: "DELETE",
                cache: true,
                data: {
                    'panier_id': id_panier,
                    'product_id': id_produit,
                    'product_variety_id': id_variety,
                },
                success: function (response) {
                    console.log(response);
                    var produit = response;
                    console.log("RESPONSE")
                    getCart(id_panier)

                },
                error: function (xhr, status, error) {
                    console.log('Error: ' + error);
                    console.error('Error: ' + xhr);
                    console.error('Error: ' + status);

                    try {
                        var err = JSON.parse(xhr.responseText);
                        if (err.msg) {
                            alert('Server error: ' + err.msg);
                        } else {
                            alert('Server error: ' + xhr.responseText);
                        }
                    } catch (e) {
                        prompt('An unknown error occurred. ' + e.message);
                        console.log('Error: ' + e);
                    }
                }
            });

        }

        </script>