
export const CardCharacter = ({ id, name, image, status, listFavorites = null, changeFavorites }) => {

    /* Parte lógica para poder utilizar la lista de favoritos */
    const handleAddToFavorites = () => {
        //Lógica para guardar en Favoritos
        console.log(id, name, image, status);

        //Propagación de datos -> Mantener los valores anteriores y agregarle unos nuevos
        //Se da con callback => arrayAnterior => [...arrayAnterior]
        /*[...arrayAnterior] ... SpreadOperator, los 3 puntitos le dicen que saque lo que ya estaba
        en el array anterior y que guarde */
        changeFavorites(prevArray => [...prevArray, { id, name, image, status }])//Los ... es una forma de hacer legible que recorre los array que tenía antes

    }

    const handleDeleteToFavorites = () => {
        changeFavorites(listFavorites.filter((favoritePj) => favoritePj.id !== id));

    }

    const findCharacterInFavorites = () => {
        return listFavorites.find((favoritePj) => favoritePj, id === id)
    }


    console.log(listFavorites);

    return (
        <div>
            <div className="card mt-4 mb-2" style={{ height: '40vh' }}> {/* Esta es la forma de poner style en REACT*/}
                <img src={image} className="card-img-top" alt="image-character" /> {/*Esta es la forma de traer las imágenes que tiene la API en REACT*/}
                <div className="card-body">
                    <h5 className="card-title">{name}</h5>
                    <p className="card-text">{status}</p>

                    {listFavorites ? findCharacterInFavorites() ? <button className="btn btn-danger" onClick={handleAddToFavorites}>Delete to favorites</button>
                        : <button className="btn btn-primary" onClick={handleAddToFavorites}>Add to favorites</button>
                        : null
                    }
                </div>
            </div>
        </div>
    )
}

//Props -> Cuando necesitamos enviar info de un componente a otro, se hace por medio de PROPS (Propiedades)