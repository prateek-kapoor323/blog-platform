
<div class="container">

    <form  method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="Title">Post Title</label>
            <input type="text" class="form-control"  placeholder="Enter title" name="title">
        </div>
        <div class="form-group">
            <label for="Author">Post Author</label>
            <input type="text" placeholder="Author Name" class="form-control" name="author">
        </div>

        <div class="form-group">
            <label for="category">Post Category</label>
            <input type="text" class="form-control"  placeholder="Enter Category" name="category">
        </div>

        <div class="form-group">
            <label for="Post Tags">Post Tags</label>
            <input type="text" class="form-control" placeholder="Post Tags" name="tags">
        </div>

        <label for="image">Upload Image</label>
        <br>
        <input type="file" name="image" id="fileToUpload">
        <br>

        <div class="form-group">
            <label for="Status">Post Status</label>
            <input type="text" class="form-control"  placeholder="Post Status" name="status">
        </div>

        <div class="form-group">
            <label for="Post Content">Post Content</label>
            <input type="text" class="form-control"  placeholder="Post Content" name="content">
        </div>


        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
</body>