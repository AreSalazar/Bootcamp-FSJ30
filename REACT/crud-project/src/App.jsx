//crud-project está emparejado con la API KODIFRONT-API -> npm start
import { useEffect, useState } from 'react';
import './App.css';

const API_URL = "http://localhost:3001/api/tasks/"; //Es el mismo link de la API para GET, POST, PUT, DELETE

function App() {
  const [tasks, setTasks] = useState([]); //Estado para almacenar las tareas en un array
  //Estados para manejar los valores del formulario:
  const [newTask, setNewTask] = useState({ title: "", description: "", completed: false });
  const [updateTaskData, setUpdateTaskData] = useState({ id: "", title: "", description: "", completed: false });
  const [deleteId, setDeleteId] = useState("");

  //GET -> Obtener los datos de la tarea---------------------------------------------
  const fetchTasks = () => {
    fetch(API_URL) //Aquí se llama a la API para la petición GET
      .then(response => response.json()) //Se convierte la respuesta a JSON, ya que la API maneja JSON
      .then(data => setTasks(data)) //Se guarda las tareas en el estado de "tasks"
      .catch(error => console.error('Error fetching tasks:', error)); //Se capturan errores
  };

  //POST -> Crear nuevos datos--------------------------------------------------------
  //Revisar este POST en consola (inspeccionar) de este proyecto (crud-project)
  const postTask = (e) => {
    e.preventDefault(); //Se agrega para evitar que el formulario recargue la página
    fetch(API_URL, {
      method: 'POST', //Se le indica que es una petición POST
      headers: { 'Content-Type': 'application/json' }, //Se envían los datos como JSON
      /*body: JSON.stringify({ title: 'Tarea agregada desde el front', completed: false }) //Cuando lo revises en consola, aparece este mensaje al presionar el botón "POST Task" */
      body: JSON.stringify(newTask) // el objeto "newTask" pasa a JSON
    })
      .then(response => response.json())//Se convierte la respuesta a JSON, ya que la API maneja JSON
      .then(() => {
        fetchTasks(); //Para actualizar la lista de tareas en el frontt
        setNewTask({ title: "", description: "", completed: false }); //Limpiar el form
      })
      .catch(error => console.error('Error creating task:', error));
  };

  //PUT -> Actualizar los datos-------------------------------------------------------
  const updateTask = (e) => {
    e.preventDefault();//Se agrega para evitar que el formulario recargue la página
    if (!updateTaskData.id) return alert("Debes ingresar un ID para actualizar");

    fetch(`${API_URL}${updateTaskData.id}`, { //Unir el ID al link API
      method: 'PUT', //Se le indica que es una petición PUT
      headers: { 'Content-Type': 'application/json' }, //Se envían los datos como JSON
      body: JSON.stringify(updateTaskData) // el objeto "newTask" pasa a JSON
    })
      .then(response => response.json())
      .then(() => {
        fetchTasks(); //Para actualizar la lista de tareas en el frontt
        setUpdateTaskData({ id: "", title: "", description: "", completed: false });//Limpiar el form
      })
      .catch(error => console.error('Error updating task:', error));
  };

  //DELETE -> Eliminar los datos--------------------------------------------------------
  const deleteTask = (e) => {
    e.preventDefault(); //Se agrega para evitar que el formulario recargue la página
    if (!deleteId) return alert("Debes ingresar un ID para eliminar");

    fetch(`${API_URL}${deleteId}`, { method: 'DELETE' })//Unir el ID y enviar la petición DELETE
      .then(response => response.json())//Se envían los datos como JSON
      .then(() => {
        fetchTasks(); //Para actualizar la lista de tareas en el frontt
        setDeleteId(""); //Limpiar el ID form
      })
      .catch(error => console.error('Error deleting task:', error));
  };
 //--------------------------------------------useEffect--------------------------------------------------//
  useEffect(() => {
    fetchTasks(); //Se llama a la función GET para mostrar las tareas guardadas
  }, []); //El array vacío -> indica que solo se ejecuta una vez al inicio

  return (
    <div className="container">
      <h1 className="text-center mb-4">CRUD con Formulario - Kodifront API</h1>

      {/*GET -> Mostrar las tareas en una tabla*/}
      <h3>Lista de tareas</h3>
      <table className="table">
        <thead className="table-dark">
          <tr>
            <th>ID</th>
            <th>Título</th>
            <th>Descripción</th>
            <th>Completado</th>
          </tr>
        </thead>
        <tbody>
          {tasks.length > 0 ? (
            tasks.map((task) => (
              <tr key={task.id}>
                <td>{task.id}</td>
                <td>{task.title}</td>
                <td>{task.description}</td>
                <td>{task.completed ? "Sí" : "No"}</td>
              </tr>
            ))
          ) : (
            <tr>
              <td colSpan="4" className="text-center">No hay tareas registradas</td>
            </tr>
          )}
        </tbody>
      </table>

      {/*POST*/}
      <h3 className="mt-5">Crear nueva tarea</h3>

      <form onSubmit={postTask} className="mb-4">

        <div className="mb-3">
          <label className="form-label">Título</label>
          <input type="text" className="form-control" value={newTask.title}
            onChange={(e) => setNewTask({ ...newTask, title: e.target.value })} required />
        </div>

        <div className="mb-3">
          <label className="form-label">Descripción</label>
          <input type="text" className="form-control" value={newTask.description}
            onChange={(e) => setNewTask({ ...newTask, description: e.target.value })} />
        </div>

        <div className="mb-3">
          <label className="form-check-label">¿Completada?</label>
          <input type="checkbox" className="form-check-input"
            checked={newTask.completed}
            onChange={(e) => setNewTask({ ...newTask, completed: e.target.checked })} />
        </div>

        <button type="submit" className="btn btn-success">Crear</button>

      </form>

      {/*PUT*/}
      <h3 className="mt-5">Actualizar</h3>

      <form onSubmit={updateTask} className="mb-4">

        <div className="mb-3">
          <label className="form-label">ID</label>
          <input type="number" className="form-control" value={updateTaskData.id}
            onChange={(e) => setUpdateTaskData({ ...updateTaskData, id: e.target.value })} required />
        </div>

        <div className="mb-3">
          <label className="form-label">Nuevo título</label>
          <input type="text" className="form-control" value={updateTaskData.title}
            onChange={(e) => setUpdateTaskData({ ...updateTaskData, title: e.target.value })} required />
        </div>

        <div className="mb-3">
          <label className="form-label">Nueva descripción</label>
          <input type="text" className="form-control" value={updateTaskData.description}
            onChange={(e) => setUpdateTaskData({ ...updateTaskData, description: e.target.value })} />
        </div>

        <div className="mb-3">
          <label className="form-check-label">¿Completada?</label>
          <input type="checkbox" className="form-check-input"
            checked={updateTaskData.completed}
            onChange={(e) => setUpdateTaskData({ ...updateTaskData, completed: e.target.checked })} />
        </div>

        <button type="submit" className="btn btn-warning">Actualizar</button>

      </form>

      {/*DELETE*/}
      <h3 className="mt-5">Eliminar</h3>

      <form onSubmit={deleteTask}>

        <div className="mb-3">
          <label className="form-label">ID</label>
          <input type="number" className="form-control" value={deleteId}
            onChange={(e) => setDeleteId(e.target.value)} required />
        </div>

        <button type="submit" className="btn btn-danger">Eliminar</button>

      </form>
    </div>
  );
}

export default App;
