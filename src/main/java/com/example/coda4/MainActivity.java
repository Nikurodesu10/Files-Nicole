package com.example.coda4;


import android.os.Bundle;
import android.widget.CheckBox;
import android.widget.EditText;
import android.widget.Button;
import android.widget.LinearLayout;
import android.widget.TextView;
import android.view.View;
import android.widget.Toast;
import androidx.appcompat.app.AppCompatActivity;

public class MainActivity extends AppCompatActivity {

    private EditText taskName1, taskName2, taskName3;
    private CheckBox todo1, todo2, todo3;
    private EditText noteInput;
    private LinearLayout savedTasksLayout;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);

        // Initialize views
        todo1 = findViewById(R.id.todo1);
        todo2 = findViewById(R.id.todo2);
        todo3 = findViewById(R.id.todo3);
        taskName1 = findViewById(R.id.taskName1);
        taskName2 = findViewById(R.id.taskName2);
        taskName3 = findViewById(R.id.taskName3);
        noteInput = findViewById(R.id.noteInput);
        savedTasksLayout = findViewById(R.id.savedTasksLayout);

        // Save Button Logic
        Button saveButton = findViewById(R.id.saveButton);
        saveButton.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                saveMeetingNotes();
            }
        });
    }

    private void saveMeetingNotes() {
        // Get task names and checkbox states
        String taskList = "";
        if (!taskName1.getText().toString().isEmpty()) {
            taskList += "Task 1: " + taskName1.getText().toString();
            taskList += todo1.isChecked() ? " (Completed)" : " (Not Completed)";
            taskList += "\n";
        }
        if (!taskName2.getText().toString().isEmpty()) {
            taskList += "Task 2: " + taskName2.getText().toString();
            taskList += todo2.isChecked() ? " (Completed)" : " (Not Completed)";
            taskList += "\n";
        }
        if (!taskName3.getText().toString().isEmpty()) {
            taskList += "Task 3: " + taskName3.getText().toString();
            taskList += todo3.isChecked() ? " (Completed)" : " (Not Completed)";
            taskList += "\n";
        }

        // Get the user notes
        String userNotes = noteInput.getText().toString();

        // Dynamically add saved tasks to the layout
        TextView savedTasksTextView = new TextView(MainActivity.this);
        savedTasksTextView.setText("Tasks:\n" + taskList + "\nNotes:\n" + userNotes);
        savedTasksTextView.setPadding(8, 8, 8, 8);
        savedTasksTextView.setTextSize(16);
        savedTasksLayout.removeAllViews(); // Remove any previously saved tasks
        savedTasksLayout.addView(savedTasksTextView); // Add the new saved task list

        // Optionally, show a Toast
        Toast.makeText(MainActivity.this, "Meeting saved successfully!", Toast.LENGTH_SHORT).show();
    }
}
