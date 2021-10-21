[[!FormIt?
   &hooks=`ReviewsSave`
   &validate=`name:required,email:email:required,review:required:stripTags`
   &successMessage=`Your review has been received.`
]]

<form method="post" action="[[~[[*id]]]]">
    [[!+fi.validation_error_message:notempty=`<p class="alert alert-danger">[[!+fi.validation_error_message]]</p>`]]
    [[!+fi.error_message:notempty=`<p class="alert alert-danger">[[!+fi.error_message]]</p>`]]
    [[!+fi.successMessage:notempty=`<p class="alert alert-success">[[!+fi.successMessage]]</p>`]]

    <input type="hidden" name="resource_id" value="[[*id]]">

    <div class="mb-3">
        <label for="name">Name <small>(Publicly Viewable)</small></label>
        <input type="text" name="name" id="name" class="form-control" value="[[!+fi.name]]" required>
        <span class="text-danger">[[!+fi.error.name]]</span>
    </div>

    <div class="mb-3">
        <label for="email">Email <small>(Used for rewards, not publicly viewable)</small></label>
        <input type="text" name="email" id="email" class="form-control" value="[[!+fi.email]]" required>
        <span class="text-danger">[[!+fi.error.email]]</span>
    </div>

    <div class="mb-3">
        <label for="rating">Rating</label>
        <select name="rating" id="rating" class="form-select">
            <option value="1">1 Star</option>
            <option value="2">2 Stars</option>
            <option value="3">3 Stars</option>
            <option value="4">4 Stars</option>
            <option value="5" selected>5 Stars</option>
        </select>
        <span class="text-danger">[[!+fi.error.rating]]</span>
    </div>

    <div class="mb-3">
        <label for="review">Review</label>
        <textarea rows="5" class="form-control" id="review" name="review" required value="[[!+fi.review]]">[[!+fi.review]]</textarea>
    </div>

    <button type="submit" class="btn btn-primary">SUBMIT</button>

</form>
