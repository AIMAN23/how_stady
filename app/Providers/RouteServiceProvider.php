<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    use \Mcamara\LaravelLocalization\Traits\LoadsTranslatedCachedRoutes;
    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App\Http\Controllers';

    /**
     * The path to the "home" route for your application.
     *
     * @var string
     */
    // تعريف الروابط لصفحات الرئيسية لكل مستخدم
    public const HOME = '/home';
    public const manager= 'manager/home';
    public const ADMIN= 'admin/home';
    public const supervisor= 'supervisor/home';
    public const specialist= 'specialist/home';
    public const agent= 'agent/home';
    public const financial= 'financial/home';
    public const secretary= 'secretary/home';
    public const teacher= 'teacher/home';
    public const student= 'student/home';
    public const pareent= 'pareent/home';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        //

        parent::boot();
    }

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map()
    {
        // Api الروابط الخاصة بتطبيقات الـ 
        $this->mapApiRoutes();
        
        // الروابط الخاصة بضيوف الموقع
        $this->mapWebRoutes();
        
        // الروابط الخاصة بادمن المدرسة
        $this->mapAdminRoutes();
        
        // manager
        $this->mapManagerRoutes();
        
        // supervisor
        $this->mapSupervisorRoutes();
        // agent
        // Specialist
        $this->mapSpecialistRoutes();
        // agent
        $this->mapAgentRoutes();
        // secretary
        $this->mapSecretaryRoutes();
        // teacher
        $this->mapTeacherRoutes();
        // student
        $this->mapStudentRoutes();
        
        // financial
        $this->mapFinancialRoutes();
        // pareent
        $this->mapPareentRoutes();
        //
    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapWebRoutes()
    {
        // تعريف خصائص روابط ضيوف الموقع
        Route::middleware('web')
             ->namespace($this->namespace)
             ->group(base_path('routes/web.php'));
    }

    protected function mapAdminRoutes()
    {
        // تعريف خصائص روابط ادمن المدرسة
        Route::middleware('admin')
            ->namespace($this->namespace)
            ->group(base_path('routes/admin.php'));
    }

    protected function mapManagerRoutes()
    {
        // تعريف خصائص روابط manager
        Route::middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/manager.php'));
    }
    protected function mapSupervisorRoutes()
    {
        // تعريف خصائص روابط supervisor
        Route::middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/supervisor.php'));
    }
    protected function mapSpecialistRoutes()
    {
        // تعريف خصائص روابط specialist
        Route::middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/specialist.php'));
    }
    protected function mapAgentRoutes()
    {
        // تعريف خصائص روابط agent
        Route::middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/agent.php'));
    }
    protected function mapSecretaryRoutes()
    {
        // تعريف خصائص روابط secretary
        Route::middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/secretary.php'));
    }
    protected function mapTeacherRoutes()
    {
        // تعريف خصائص روابط teacher
        Route::middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/teacher.php'));
    }
    protected function mapStudentRoutes()
    {
        // تعريف خصائص روابط student
        Route::middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/student.php'));
    }
    protected function mapFinancialRoutes()
    {
        // تعريف خصائص روابط financial
        Route::middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/financial.php'));
    }

    protected function mapPareentRoutes()
    {
        // تعريف خصائص روابط manager
        Route::middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/pareent.php'));
    }

    /**
     * Define the "api" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapApiRoutes()
    {
        // Api تعريف خصائص روابط الـ 
        Route::prefix('api')
             ->middleware('api')
             ->namespace($this->namespace)
             ->group(base_path('routes/api.php'));
    }
}
