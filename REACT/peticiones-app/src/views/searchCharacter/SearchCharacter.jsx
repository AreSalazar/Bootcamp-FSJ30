import { useForm } from "react-hook-form"
import { CardCharacter } from "../../components/CardCharacter"

//rafc
const API_URL = "https://rickandmortyapi.com/api/character/?name="

export const SearchCharacter = () => {
    const { register, handSubmit } = useForm()
    const [character, setCharacter] = useStae({})

    const onSubmitForm = (data) => {
        console.log(data);
        console.log(`${API_URL}${data.name}`)//Imprime el link de la API con el PJ buscado
        //console.log(API_URL+data.name);

        fetch(`${API_URL}${data.name}`)
            .then(response => response.json())
            .then(character => {
                console.log(character.results[0]);
                setCharacter(character.results[0])
            })
    }

    return (
        <section className='row justifify-content-center'>
            <div className='col-6'>
                <div className='card'>
                    <div className='card-body'>
                        <h3 className='card-title text-center'>Search a character from Rick and Morty</h3>
                        <form className="form-group">
                            <label className='form-label'>Name of character</label>
                            <input className='form-label' type="text" placeholder="Search Character" {...register('name')} />
                            <button className='btn btn-primary mt-2'>Search</button>
                        </form>
                    </div>
                </div>
            </div>

            {character.name === "" ? null :
                <section className="row justify-content-center">
                    <div className="col-md-6 col-sm-12">

                        <CardCharacter
                            id={character.id}
                            name={character.name}
                            image={character.image}
                            status={character.status}
                        />
                    </div>
                </section>
            }

        </section>
    )
}
