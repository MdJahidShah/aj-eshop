import React, { useState, useEffect } from 'react';

export default function App() {
  const [page, setPage] = useState('login'); // login | register | editor
  const [username, setUsername] = useState('');
  const [password, setPassword] = useState('');
  const [projects, setProjects] = useState([]);
  const [activeProject, setActiveProject] = useState(null);
  const [videoFile, setVideoFile] = useState(null);
  const [resolution, setResolution] = useState('1080p');
  const [format, setFormat] = useState('mp4');

  // Load projects from localStorage
  useEffect(() => {
    const storedProjects = JSON.parse(localStorage.getItem('userProjects'));
    if (storedProjects) {
      setProjects(storedProjects);
    }
  }, []);

  // Save projects to localStorage
  useEffect(() => {
    if (projects.length > 0) {
      localStorage.setItem('userProjects', JSON.stringify(projects));
    }
  }, [projects]);

  // Mock login handler
  const handleLogin = (e) => {
    e.preventDefault();
    const storedUser = localStorage.getItem(`user_${username}`);
    if (storedUser && storedUser === password) {
      setPage('editor');
    } else {
      alert('Invalid credentials or account not found.');
    }
  };

  // Register new user
  const handleRegister = (e) => {
    e.preventDefault();
    if (!username || !password) {
      alert('Please enter both username and password.');
      return;
    }
    if (localStorage.getItem(`user_${username}`)) {
      alert('Username already taken.');
      return;
    }
    localStorage.setItem(`user_${username}`, password);
    alert('Registration successful! Please log in.');
    setPage('login');
  };

  // Create new project
  const createNewProject = () => {
    const newProject = {
      id: Date.now(),
      name: `Project ${projects.length + 1}`,
      date: new Date().toISOString(),
      resolution,
      format,
    };
    setProjects([...projects, newProject]);
    setActiveProject(newProject);
  };

  // Select existing project
  const selectProject = (project) => {
    setActiveProject(project);
  };

  // Download video
  const downloadVideo = () => {
    if (!activeProject) {
      alert('Please select a project to download');
      return;
    }

    const blob = new Blob([`This is your edited video in ${activeProject.resolution} as ${activeProject.format}`], {
      type: 'text/plain',
    });
    const url = URL.createObjectURL(blob);
    const a = document.createElement('a');
    a.href = url;
    a.download = `${activeProject.name}.${activeProject.format}`;
    a.click();
    URL.revokeObjectURL(url);
  };

  return (
    <div className="bg-gray-900 min-h-screen text-white">
      {page === 'login' && (
        <div className="flex items-center justify-center h-screen bg-gradient-to-br from-purple-900 via-black to-blue-900 px-4">
          <form onSubmit={handleLogin} className="bg-gray-800 p-8 rounded-lg shadow-xl max-w-md w-full">
            <h1 className="text-3xl font-bold mb-6 text-center">Login</h1>
            <input
              type="text"
              placeholder="Username"
              value={username}
              onChange={(e) => setUsername(e.target.value)}
              className="w-full p-3 mb-4 rounded bg-gray-700 border border-gray-600 focus:outline-none focus:ring-2 focus:ring-purple-500"
              required
            />
            <input
              type="password"
              placeholder="Password"
              value={password}
              onChange={(e) => setPassword(e.target.value)}
              className="w-full p-3 mb-6 rounded bg-gray-700 border border-gray-600 focus:outline-none focus:ring-2 focus:ring-purple-500"
              required
            />
            <button
              type="submit"
              className="w-full bg-purple-600 hover:bg-purple-700 transition-colors py-3 rounded font-semibold text-lg"
            >
              Login
            </button>
            <p className="mt-4 text-center text-sm text-gray-400">
              Don't have an account?{' '}
              <button onClick={() => setPage('register')} type="button" className="text-blue-400 underline">
                Register here
              </button>
            </p>
          </form>
        </div>
      )}

      {page === 'register' && (
        <div className="flex items-center justify-center h-screen bg-gradient-to-br from-purple-900 via-black to-blue-900 px-4">
          <form onSubmit={handleRegister} className="bg-gray-800 p-8 rounded-lg shadow-xl max-w-md w-full">
            <h1 className="text-3xl font-bold mb-6 text-center">Register</h1>
            <input
              type="text"
              placeholder="Username"
              value={username}
              onChange={(e) => setUsername(e.target.value)}
              className="w-full p-3 mb-4 rounded bg-gray-700 border border-gray-600 focus:outline-none focus:ring-2 focus:ring-purple-500"
              required
            />
            <input
              type="password"
              placeholder="Password"
              value={password}
              onChange={(e) => setPassword(e.target.value)}
              className="w-full p-3 mb-6 rounded bg-gray-700 border border-gray-600 focus:outline-none focus:ring-2 focus:ring-purple-500"
              required
            />
            <button
              type="submit"
              className="w-full bg-green-600 hover:bg-green-700 transition-colors py-3 rounded font-semibold text-lg"
            >
              Register
            </button>
            <p className="mt-4 text-center text-sm text-gray-400">
              Already have an account?{' '}
              <button onClick={() => setPage('login')} type="button" className="text-blue-400 underline">
                Log in
              </button>
            </p>
          </form>
        </div>
      )}

      {page === 'editor' && (
        <div className="flex flex-col md:flex-row h-screen overflow-hidden">
          {/* Sidebar */}
          <aside className="md:w-64 bg-gray-800 p-4 flex-shrink-0 flex flex-col">
            <h2 className="text-xl font-bold mb-4">Projects</h2>
            <ul className="space-y-2 overflow-y-auto flex-grow">
              {projects.map((project) => (
                <li key={project.id}>
                  <button
                    onClick={() => selectProject(project)}
                    className={`w-full text-left p-2 rounded ${
                      activeProject?.id === project.id ? 'bg-purple-700' : 'hover:bg-gray-700'
                    }`}
                  >
                    {project.name}
                  </button>
                </li>
              ))}
            </ul>
            <button
              onClick={createNewProject}
              className="mt-4 bg-green-600 hover:bg-green-700 py-2 rounded font-semibold transition-colors"
            >
              New Project
            </button>
          </aside>

          {/* Main editor area */}
          <main className="flex-1 p-6 bg-gray-900 flex flex-col space-y-6 overflow-auto">
            {activeProject ? (
              <>
                <div className="bg-gray-800 p-6 rounded-lg shadow-lg flex-1 flex flex-col items-center justify-center">
                  <div className="w-full max-w-2xl aspect-video bg-black flex items-center justify-center mb-4 relative">
                    {videoFile ? (
                      <video src={URL.createObjectURL(videoFile)} controls className="w-full h-full object-contain" />
                    ) : (
                      <span className="text-gray-500 text-center">Upload or edit your video here</span>
                    )}
                  </div>
                  <label className="mt-4 bg-blue-600 hover:bg-blue-700 py-2 px-4 rounded cursor-pointer transition-colors">
                    Upload Video
                    <input type="file" accept="video/*" onChange={(e) => setVideoFile(e.target.files[0])} hidden />
                  </label>
                </div>

                <div className="grid grid-cols-1 md:grid-cols-2 gap-6">
                  <div className="bg-gray-800 p-6 rounded-lg shadow-lg">
                    <h3 className="text-lg font-semibold mb-4">Export Settings</h3>
                    <div className="space-y-4">
                      <div>
                        <label className="block mb-2">Resolution</label>
                        <select
                          value={resolution}
                          onChange={(e) => setResolution(e.target.value)}
                          className="w-full p-2 bg-gray-700 rounded border border-gray-600"
                        >
                          <option>1080p</option>
                          <option>720p</option>
                          <option>480p</option>
                        </select>
                      </div>
                      <div>
                        <label className="block mb-2">Format</label>
                        <select
                          value={format}
                          onChange={(e) => setFormat(e.target.value)}
                          className="w-full p-2 bg-gray-700 rounded border border-gray-600"
                        >
                          <option>mp4</option>
                          <option>webm</option>
                          <option>mov</option>
                        </select>
                      </div>
                      <button
                        onClick={downloadVideo}
                        className="w-full bg-purple-600 hover:bg-purple-700 py-2 rounded font-semibold transition-colors mt-4"
                      >
                        Download Video
                      </button>
                    </div>
                  </div>

                  <div className="bg-gray-800 p-6 rounded-lg shadow-lg">
                    <h3 className="text-lg font-semibold mb-4">Project Info</h3>
                    <p>
                      <strong>Name:</strong> {activeProject.name}
                    </p>
                    <p>
                      <strong>Date Created:</strong>{' '}
                      {new Date(activeProject.date).toLocaleString()}
                    </p>
                    <p>
                      <strong>Resolution:</strong> {activeProject.resolution}
                    </p>
                    <p>
                      <strong>Format:</strong> {activeProject.format}
                    </p>
                    <p className="mt-4 text-sm text-gray-400">
                      Your project data will be stored for 10 days. Make sure to download it before it expires.
                    </p>
                  </div>
                </div>
              </>
            ) : (
              <div className="bg-gray-800 p-8 rounded-lg shadow-lg flex-1 flex items-center justify-center">
                <p className="text-gray-400 text-center">
                  Select a project or create a new one to start editing
                </p>
              </div>
            )}
          </main>
        </div>
      )}
    </div>
  );
}