
<div>
{{#each phoneNumberData}}
    <div class="input-group phone-number-block">
        <span class="input-group-btn">
            <select data-property-type="type" class="form-control">{{options ../params.typeList type scope=../scope field=../name}}</select>
        </span>
        <input type="input" class="form-control phone-number no-margin-shifting" value="{{phoneNumber}}" autocomplete="espo-{{../name}}" maxlength={{../itemMaxLength}}>
        <span class="input-group-btn">
            <button class="btn btn-default_gray btn-icon phone-property{{#if primary}} active{{/if}} hidden" type="button" tabindex="-1" data-action="switchPhoneProperty" data-property-type="primary" data-toggle="tooltip" data-placement="top" title="{{translate 'Primary' scope='PhoneNumber'}}">
                <span class="material-icons-outlined{{#unless primary}} text-muted{{/unless}} text-blue-icon">star</span>
            </button>
            <button class="btn btn-default_gray btn-icon phone-property{{#if optOut}} active{{/if}}" type="button" tabindex="-1" data-action="switchPhoneProperty" data-property-type="optOut" data-toggle="tooltip" data-placement="top" title="{{translate 'Opted Out' scope='EmailAddress'}}">
                <span class="material-icons-outlined{{#unless optOut}} text-muted{{/unless}} text-blue-icon">not_interested</span>
            </button>
            <button class="btn btn-default_gray btn-icon phone-property{{#if invalid}} active{{/if}}" type="button" tabindex="-1" data-action="switchPhoneProperty" data-property-type="invalid" data-toggle="tooltip" data-placement="top" title="{{translate 'Invalid' scope='EmailAddress'}}">
                <span class="material-icons-outlined{{#unless invalid}} text-muted{{/unless}} text-blue-icon">error_outline</span>
            </button>
            <button class="btn btn-link-gray btn-icon hidden" type="button" tabindex="-1" data-action="removePhoneNumber" data-property-type="invalid" data-toggle="tooltip" data-placement="top" title="{{translate 'Remove'}}">
                <span class="material-icons-outlined text-blue-icon">close</span>
            </button>
            <button class="btn btn-danger btn-icon" type="button" data-action="addPhoneNumber"><span class="material-icons-outlined">add</span></button>
        </span>
    </div>
{{/each}}
</div>


