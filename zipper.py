import os
import zipfile

def zip_project(source_dir, output_filename, exclude_dirs):
    with zipfile.ZipFile(output_filename, 'w', zipfile.ZIP_DEFLATED) as zipf:
        for root, dirs, files in os.walk(source_dir):
            # Modify dirs in-place to skip excluded directories
            dirs[:] = [d for d in dirs if d not in exclude_dirs]
            
            for file in files:
                file_path = os.path.join(root, file)
                # Create a relative path for the zip archive
                arcname = os.path.relpath(file_path, os.path.dirname(source_dir))
                
                print(f"Adding {arcname}")
                zipf.write(file_path, arcname)

if __name__ == "__main__":
    source = r"c:\Users\Mohammed\Desktop\newProlaravel\jar"
    output = r"c:\Users\Mohammed\Desktop\newProlaravel\project_full_clean.zip"
    excludes = ['node_modules', '.git']
    
    print(f"Zipping {source} to {output}...")
    zip_project(source, output, excludes)
    print("Done!")
