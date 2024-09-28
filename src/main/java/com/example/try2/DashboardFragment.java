package com.example.try2;

import android.os.Bundle;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.ImageButton;
import androidx.annotation.NonNull;
import androidx.annotation.Nullable;
import androidx.fragment.app.Fragment;
import androidx.fragment.app.FragmentTransaction;

public class DashboardFragment extends Fragment {

    ImageButton buttonExpenses, buttonIncome, buttonReport, buttonProfile;

    @Nullable
    @Override
    public View onCreateView(@NonNull LayoutInflater inflater, @Nullable ViewGroup container, @Nullable Bundle savedInstanceState) {
        // Inflate the dashboard fragment layout
        View view = inflater.inflate(R.layout.fragment_dashboard, container, false);

        // Find the buttons from the layout
        buttonExpenses = view.findViewById(R.id.button_expenses);
        buttonIncome = view.findViewById(R.id.button_income);
        buttonReport = view.findViewById(R.id.button_report);
        buttonProfile = view.findViewById(R.id.button_profile);

        // Set up click listener for Expenses button
        buttonExpenses.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                // Load the ExpensesFragment
                loadFragment(new ExpensesFragment());
            }
        });

        // Set up click listener for Income button
        buttonIncome.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                // Load the IncomeFragment
                loadFragment(new IncomeFragment());
            }
        });

        // Set up click listener for Report button
        buttonReport.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                // Load the ReportFragment
                loadFragment(new ReportsFragment());
            }
        });

        // Set up click listener for Profile button
        buttonProfile.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                // Load the ProfileFragment
                loadFragment(new ProfileFragment());
            }
        });

        return view;
    }

    // Method to replace the current fragment with the given fragment
    private void loadFragment(Fragment fragment) {
        // Create a new fragment transaction
        FragmentTransaction transaction = getFragmentManager().beginTransaction();
        // Replace the current fragment with the new fragment
        transaction.replace(R.id.fragment_container, fragment);
        // Add this transaction to the back stack so the user can navigate back
        transaction.addToBackStack(null);
        // Commit the transaction
        transaction.commit();
    }
}
