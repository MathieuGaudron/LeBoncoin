<style>

    body {
        background-color: #595959;
    }


    form {
        max-width: 600px;
        margin: 50px auto;
        padding: 30px;
        border-radius: 8px;
        background-color: #ffffff;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        font-family: 'Arial', sans-serif;
    }

    label {
        display: block;
        margin-bottom: 10px;
        font-weight: bold;
        color: #333333;
    }

    input,
    textarea {
        width: 100%;
        padding: 12px;
        margin-bottom: 20px;
        border: 1px solid #FF5733;
        border-radius: 4px;
        font-size: 16px;
        transition: border-color 0.3s ease;
    }

    input:focus,
    textarea:focus {
        border-color: #007bff;
        outline: none;
    }

    textarea {
        resize: vertical;
        height: 120px;
    }

    button {
        width: 100%;
        padding: 12px;
        background-color: #FF5733;
        color: white;
        border: none;
        border-radius: 4px;
        font-size: 18px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    button:hover {
        background-color: #FFA180;
    }

    @media (max-width: 768px) {
        form {
            padding: 20px;
        }

        input,
        textarea {
            padding: 10px;
        }

        button {
            padding: 10px;
        }
    }
</style>


<form action="" method ="POST" enctype="multipart/form-data">
    @csrf 

    <label for="title">Title :</label>
    <input type="text" name="titlemodif" required>
    </br>

    <label for="image1">Image 1 :</label>
    <input type="file" id="image1" name="image1modif" accept="image/png, image/jpeg">
    </br>

    <label for="image2">Image 2 :</label>
    <input type="file" id="image2" name="image2modif" accept="image/png, image/jpeg">
    </br>
    

    <label for="image3">Image 3 :</label>
    <input type="file" id="image3" name="image3modif" accept="image/png, image/jpeg">
    </br>
    
    
    
    <label for="description">Description :</label>
    <textarea name="descriptionmodif" id="" cols="30" rows="10" required ></textarea>
    </br>

    <label for="price">Price :</label>
    <input type="int" name="pricemodif">
    </br>


    <button type="submit">Send</button>
    
</form>    