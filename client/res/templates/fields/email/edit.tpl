
<div>
{{#each emailAddressData}}
    <div class="input-group email-address-block">
        <input type="email" class="form-control email-address" value="{{emailAddress}}" autocomplete="espo-{{../name}}" placeholder="Email" maxlength={{../itemMaxLength}}>
        <span class="input-group-btn">
            <button class="btn btn-default_gray btn-icon email-property{{#if primary}} active{{/if}} hidden" type="button" tabindex="-1" data-action="switchEmailProperty" data-property-type="primary" data-toggle="tooltip" data-placement="top" title="{{translate 'Primary' scope='EmailAddress'}}">
                <span class="material-icons-outlined{{#unless primary}} text-muted{{/unless}} text-blue-icon">star</span>
            </button>
            <button class="btn btn-default_gray btn-icon email-property{{#if optOut}} active{{/if}}" type="button" tabindex="-1" data-action="switchEmailProperty" data-property-type="optOut" data-toggle="tooltip" data-placement="top" title="{{translate 'Opted Out' scope='EmailAddress'}}">
                <span class="material-icons-outlined{{#unless optOut}} text-muted{{/unless}} text-blue-icon">not_interested</span>
            </button>
            <button class="btn btn-default_gray btn-icon email-property{{#if invalid}} active{{/if}}" type="button" tabindex="-1" data-action="switchEmailProperty" data-property-type="invalid" data-toggle="tooltip" data-placement="top" title="{{translate 'Invalid' scope='EmailAddress'}}">
                <span class="material-icons-outlined{{#unless invalid}} text-muted{{/unless}} text-blue-icon">error_outline</span>
            </button>
            <button class="btn btn-link-gray btn-icon hidden" type="button" tabindex="-1" data-action="removeEmailAddress" data-property-type="invalid" data-toggle="tooltip" data-placement="top" title="{{translate 'Remove'}}">
                <span class="material-icons-outlined text-blue-icon">close</span>
            </button>
            <button class="btn btn-danger btn-icon" type="button" data-action="addEmailAddress"><span class="material-icons-outlined">add</span></button>
        </span>
    </div>
{{/each}}
</div>


