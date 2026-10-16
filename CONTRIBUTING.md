# Guía de Contribución

Gracias por interesarte en contribuir a este proyecto 🎉

## Cómo empezar

1. Haz un [fork](https://docs.github.com/es/get-started/quickstart/fork-a-repo) del repositorio.
2. Crea una rama descriptiva desde `main`:
   ```bash
   git checkout -b feat/nombre-de-tu-funcionalidad
   git checkout -b fix/descripcion-del-error
   ```
3. Realiza tus cambios y haz commits descriptivos siguiendo [Conventional Commits](https://www.conventionalcommits.org/) (ej. `feat:`, `fix:`, `docs:`).
4. Sube tu rama y abre un [Pull Request](https://docs.github.com/es/pull-requests/collaborating-with-pull-requests/proposing-changes-to-your-work-with-pull-requests).

## Estándares de commits

Usa el formato:
```
<tipo>: <descripción breve>
```

Tipos permitidos: `feat`, `fix`, `docs`, `style`, `refactor`, `test`, `chore`, `build`, `ci`.

Ejemplo: `feat: añade filtro de búsqueda de productos`

## Proceso de revisión

1. Un mantenedor revisará tu PR y podrá solicitar cambios.
2. Debes aprobar las revisiones antes de hacer merge.
3. Las pruebas de CI deben pasar antes de mezclar.

## Código de conducta

Este proyecto sigue un [Código de Conducta](CODE_OF_CONDUCT.md). Al participar, esperamos que lo cumplas.

## Licencia

Al contribuir, aceptas que tus contribuciones se licencien bajo la misma licencia del proyecto.
