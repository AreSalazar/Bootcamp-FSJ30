/* Vamos a declarar 2 cosas a la vez */

import { createContext, useState } from "react";

//Crear el contexto 

export const FavoritesContext = createContext();

//Proveedor de la información del contexto
//const PonerNombreCualquiera
//Wrapper -> Contiene otros componentes -> como ej. {children}
export const FavoritesDataProvider = ({ children }) => {
    //Crear el ESTADO DE LOS FAVORITOS
    //useState crea un cajita, setFavorites puede guardar datos ahí
    const [favorites, setFavorites] = useState([]); //Crear un array para guardar los pj favoritos


    return (
        //Estamos llamando al FavoritesContext para encerrar esa información que venga de ahí
        //Provider ya viene incluido para el status Context
        //Value le pasamos un valor, puede ser un comentario o en este caso los favoritos
        <FavoritesContext.Provider value={{favorites,setFavorites}}>
            {children}
        </FavoritesContext.Provider>
    )
}
