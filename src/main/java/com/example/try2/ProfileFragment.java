package com.example.try2;

import android.annotation.SuppressLint;
import android.content.Context;
import android.content.SharedPreferences;
import android.os.Bundle;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.Button;
import android.widget.EditText;
import androidx.annotation.NonNull;
import androidx.annotation.Nullable;
import androidx.fragment.app.Fragment;
import androidx.fragment.app.FragmentTransaction;

public class ProfileFragment extends Fragment {

    private EditText editName, editAddress;
    private Button buttonSave, buttonLogout, buttonBack;

    @SuppressLint("WrongViewCast")
    @Nullable
    @Override
    public View onCreateView(@NonNull LayoutInflater inflater, @Nullable ViewGroup container, @Nullable Bundle savedInstanceState) {
        // Inflate the layout for this fragment
        View view = inflater.inflate(R.layout.fragment_profile, container, false);

        // Find the UI elements
        editName = view.findViewById(R.id.edit_name);
        editAddress = view.findViewById(R.id.edit_address);
        buttonSave = view.findViewById(R.id.button_save);
        buttonLogout = view.findViewById(R.id.button_logout);
        buttonBack = view.findViewById(R.id.button_back);

        // Load saved data
        loadProfileData();

        // Save button logic to save profile data
        buttonSave.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                saveProfileData();
            }
        });

        // Logout button logic to close the app
        buttonLogout.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                getActivity().finish();
                System.exit(0);  // Exit the app
            }
        });

        // Back button logic to return to the DashboardFragment
        buttonBack.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                saveProfileData(); // Save the data before going back
                loadFragment(new DashboardFragment());  // Navigate back to dashboard
            }
        });

        return view;
    }

    // Method to save profile data in SharedPreferences
    private void saveProfileData() {
        SharedPreferences sharedPreferences = getActivity().getSharedPreferences("UserProfile", Context.MODE_PRIVATE);
        SharedPreferences.Editor editor = sharedPreferences.edit();
        editor.putString("Name", editName.getText().toString());
        editor.putString("Address", editAddress.getText().toString());
        editor.apply();  // Save changes
    }

    // Method to load saved profile data
    private void loadProfileData() {
        SharedPreferences sharedPreferences = getActivity().getSharedPreferences("UserProfile", Context.MODE_PRIVATE);
        String name = sharedPreferences.getString("Name", "");
        String address = sharedPreferences.getString("Address", "");
        editName.setText(name);
        editAddress.setText(address);
    }

    // Method to load a fragment
    private void loadFragment(Fragment fragment) {
        FragmentTransaction transaction = getFragmentManager().beginTransaction();
        transaction.replace(R.id.fragment_container, fragment);
        transaction.addToBackStack(null);
        transaction.commit();
    }
}
