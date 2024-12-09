<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Ingreso</title>
</head>
<body>
     <!-- Contenido principal -->
     <header>
        <h1>Agrega un nuevo ingreso</h1>
    </header>
    <main>
        <section>
            <form method="post" action="/incomes">

                <label for="payment_method">Metodo de pago</label>
                <select name="payment_method" id="payment_method">
                    <option value="1" selected>Cuenta bancaria</option>
                    <option value="2">Tarjeta de credito</option>
                </select>

                <label for="type">Metodo de pago</label>
                <select name="type" id="type">
                    <option value="1" selected>Pago nomina</option>
                    <option value="2">Reembolso</option>
                </select>

                <label for="date">Fecha:</label>
                <input type="text" id="date" name="date" required placeholder="Ingresa la fehca">
                
                <label for="amount">Monto:</label>
                <input type="text" id="amount" name="amount" required placeholder="Ingresa el monto">

                <label for="description">Descripción:</label>
                <textarea name="description" id="description">
                    Ingresa una descripcion del ingreso
                </textarea>

                <input type="hidden" name="method" value="post">

                <button type="submit">Agregar Ingreso</button>
            </form>
        </section>
    </main>
    <footer>
        <p>&copy; 2024</p>
    </footer>
</body>
</html>