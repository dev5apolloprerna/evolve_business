<script>
        function getEditData(id) {
            // alert(id);
            var url = "{{ route('Event.edit', ':id') }}";
            url = url.replace(":id", id);
            if (id) {
                $.ajax({
                    url: url,
                    type: 'GET',
                    data: {
                        id,
                        id
                    },
                    success: function(data) {
                        // console.log(data);
                        var obj = JSON.parse(data);
                        $("#Editname").val(obj.name);
                        $("#Editeventstart_date").val(obj.eventstart_date);
                        $("#Editeventstart_time").val(obj.eventstart_time);
                        $("#Editeventend_time").val(obj.eventend_time);
                        $("#Editeventtype").val(obj.event_type);
                        $("#Editdescription").val(obj.description);
                        // alert(obj.photo);
                        $('#hiddenPhoto').val(obj.photo);
                        var html = "";
                        if (obj.photo) {
                            html = '<img src="/event/' + obj.photo +
                                '" id="hiddenPhoto" width="50px" height = "50px" > ';
                        }
                        $('#event_id').val(id);
                        $('#PHOTOID').html(html);

                        const assignSelect = document.getElementById('Edit_assign_members');
                       const selectEl = document.getElementById('Edit_assign_members');
            if (selectEl && obj.assign_member_id) {
                let assignedIds = [];
                try {
                    assignedIds = JSON.parse(obj.assign_member_id);
                } catch(e) {
                    assignedIds = [];
                }

                // Convert to string for Choices.js compatibility
                assignedIds = assignedIds.map(id => id.toString());

                // Wait a bit for Choices.js to initialize, then set values
                setTimeout(() => {
                    if (selectEl.choicesInstance) {
                        selectEl.choicesInstance.setChoiceByValue(assignedIds);
                    } else {
                        // Fallback: native select
                        Array.from(selectEl.options).forEach(option => {
                            option.selected = assignedIds.includes(option.value);
                        });
                    }
                }, 300); // Small delay to allow Choices.js to load
            }

                        // Toggle visibility based on ispaid value
                        if (obj.ispaid == 'Yes') {
                            $("#priceField").show();
                        } else {
                            $("#priceField").hide();
                        }

                        // Toggle visibility based on limitedset value
                        if (obj.limitedset == 'Yes') {
                            $("#setnumber").show();
                        } else {
                            $("#setnumber").hide();
                        }
                    }
                });
            }
        }

        // Add change event listeners to ispaid and limitedset select elements
        $("#Editispaid").change(function() {
            if ($(this).val() == 'Yes') {
                $("#priceField").show();
            } else {
                $("#priceField").hide();
            }
        });

        $("#Editlimitedset").change(function() {
            if ($(this).val() == 'Yes') {
                $("#setnumber").show();
            } else {
                $("#setnumber").hide();
            }
        });
    </script>