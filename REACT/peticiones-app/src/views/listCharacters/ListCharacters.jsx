//rafc -> snippet para crear el componente funcional con flecha, instalar la extensión ESF7 + React/Redux..

import { useContext, useEffect, useState } from "react"
import { CardCharacter } from "../../components/CardCharacter"
import { FavoritesContext } from "../../contexts/FavoritesContext"
    

/*
1 - https://thesimpsonsapi.com/api/characters
2 - https://rickandmortyapi.com/api/character
*/
export const ListCharacters = () => {

    //Siempre que yo necesite una CAJA para GUARDAR ALGO voy a hacer un ESTADO
    //Cuando creamos un ESTADO, estamos creando 2 cosas, una para ver y otra para cambiar 
    //listPjs puedo VER lo que hay dentro de la caja, setListPjs puedo CAMBIAR lo que hay dentro de la caja
    const [listPjs, setListPjs] = useState([])

    //Utilizamos el useContext -> Hook para utilizar un contexto previamente creado
    //Sintexis para cuando teneemos 1 SOLO VALOR EN EL CONTEXTO
    /*let valorContexto = useContext(FavoritesContext)
    console.log(valorContexto);*/
    const { favorites, setFavorites } = useContext(FavoritesContext)
    //console.log(favorites);



    // Las funciones adentro de un componnente declárenlas camelCase
    const peticionApi = () => {
        //Petición a una API
        fetch('https://rickandmortyapi.com/api/character') // API DE LOS SIMPSON
            //.then(response =>console.log(response.json())) -> Con el .json su respuesta es una promesa, ver en inspeccionar
            .then(response => response.json()) //Dame una respuesta (response) de la promesa (response.json())
            .then(data => {
                console.log(data);
                //Necesito sacar esa data de acá dentro
                setListPjs(data.results);
            })
            .catch(error => console.log(error)) //Manejo de error para then
    }


    console.log(listPjs);


    //asyn function peticionApiAA(){} De esta manera se escribe si fuera una función (function) y no const
    const peticionApiAA = async () => {
        //Manejo de error para await
        try {
            //Reemplazo al primer .then
            let response = await fetch('https://rickandmortyapi.com/api/character') // API DE RICK Y MORTY
            //console.log(response);
            //Reemplazo para el segundo .then
            let data = await response.json(); //Await -> Espera a que busque los datos
            console.log(data);
        } catch (error) {
            console.error(error)
        }
    }

    //useEffect -> Cuando necesito cargar datos apenas se vaya a montar el componente
    //Se usa para cargar datos apenas se va a montar el componente, de lo contrario no se usa
    //Ciclo de vida useEffect -> Montaje, Actualización, Desmontaje
    //Montaje: ejecuta todo lo que está dentro del callback
    useEffect(() => {

        peticionApi();

    }, [])//Se pone el array [] para que no siga consumiendo el useEffect y halla cierre, siempre tiene que estar




    return (
        <div>
            <div className="row">
                {/*Recorrer el arrray para mostrar los datos -> Mapear los datos para pintarlos*/}

                {listPjs.map((character) => {
                    //El key es para que React sepa qué elemento es el que está pintando, no see repita
                    return <section key={character.id} className="col-md-3 col-sm-12">
                        <CardCharacter
                            name={character.name}
                            image={character.image}
                            status={character.status}
                            listFavorites={favorites}
                            changeFavorites={setFavorites}
                        />
                    </section>
                })}
                /</div>
        </div>
    )
}



