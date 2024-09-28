package com.example.try2;

import android.os.Bundle;
import android.text.TextUtils;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.Button;
import android.widget.EditText;
import android.widget.ImageButton;
import android.widget.Toast;

import androidx.annotation.NonNull;
import androidx.annotation.Nullable;
import androidx.fragment.app.Fragment;

public class EditIncomeFragment extends Fragment {

    private EditText editDate, editSaleSugar, editMolasses, editTrackingIncentives;
    private Button buttonSave;
    private ImageButton buttonBack;

    @Nullable
    @Override
    public View onCreateView(@NonNull LayoutInflater inflater, @Nullable ViewGroup container, @Nullable Bundle savedInstanceState) {
        // Inflate the layout for this fragment
        View view = inflater.inflate(R.layout.fragment_edit_income, container, false);

        // Initialize the UI elements
        editDate = view.findViewById(R.id.edit_date);
        editSaleSugar = view.findViewById(R.id.edit_sale_sugar);
        editMolasses = view.findViewById(R.id.edit_molasses);
        editTrackingIncentives = view.findViewById(R.id.edit_tracking_incentives);
        buttonSave = view.findViewById(R.id.button_save);
        buttonBack = view.findViewById(R.id.button_back);

        // Set up the back button
        buttonBack.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                // Handle the back action, typically pop the fragment or navigate to the previous screen
                getActivity().onBackPressed();
            }
        });

        // Set up the save button click listener
        buttonSave.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                saveIncomeData();
            }
        });

        return view;
    }

    private void saveIncomeData() {
        // Get input data from EditText fields
        String date = editDate.getText().toString().trim();
        String saleSugar = editSaleSugar.getText().toString().trim();
        String molasses = editMolasses.getText().toString().trim();
        String trackingIncentives = editTrackingIncentives.getText().toString().trim();

        // Validate fields
        if (TextUtils.isEmpty(date) || TextUtils.isEmpty(saleSugar) || TextUtils.isEmpty(molasses) || TextUtils.isEmpty(trackingIncentives)) {
            Toast.makeText(getContext(), "Please fill out all fields.", Toast.LENGTH_SHORT).show();
            return;
        }

        // Save data (this part can include saving to a database, SharedPreferences, or passing back to another fragment)
        // Here, it's just a Toast message for demo purposes
        Toast.makeText(getContext(), "Income Data Saved:\n" +
                "Date: " + date + "\n" +
                "Sale of Sugar: " + saleSugar + "\n" +
                "Molasses: " + molasses + "\n" +
                "Tracking Incentives: " + trackingIncentives, Toast.LENGTH_LONG).show();

        // Navigate back or close the fragment after saving (optional)
        getActivity().onBackPressed();
    }
}
